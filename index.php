<?php

require 'vendor/autoload.php';

use Sabre\VObject;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env', __DIR__.'/.env.local');

$calendar = VObject\Reader::read(file_get_contents($_ENV['CALENDAR_ICS']));
$weeklyEvents = [];
foreach ($calendar->getComponents() as $event) {
    $summary = trim(preg_replace('/\s*\(.*?\)\s*/', ' ', ucwords(strtolower((string)$event->SUMMARY))));
    $start = new DateTime((string)$event->DTSTART);
    $end = new DateTime((string)$event->DTEND);
    $duration = ($end->getTimestamp() - $start->getTimestamp()) / 3600; // Convertir en heures
    $week = $start->format('Y-W');
    if (!isset($weeklyEvents[$week])) {
        $weeklyEvents[$week] = [];
    }
    if (!isset($weeklyEvents[$week][$summary])) {
        $weeklyEvents[$week][$summary] = 0;
    }
    $weeklyEvents[$week][$summary] += $duration;
}
ksort($weeklyEvents);
echo "Total duration of events per week :\n";
foreach ($weeklyEvents as $week => $events) {
    ksort($events);
    $total = array_sum($events);
    echo "\nWeek $week (".round($total, 2)." hours) :\n";
    foreach ($events as $event => $duration) {
        $pct = $duration / $total * 100;
        echo "  - $event : " . round($duration, 2) . " hours - ".round($pct)."%\n";
    }
}
