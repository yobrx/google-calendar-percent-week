# Google Calendar Display by Percent and Week

This script display a Google Calendar with the percent of time spent on each event and the week number, grouped by week and name.

## Requirements

- PHP 8.1

## Installation

```bash
composer install
```
## Usage

Get Ical URL or file from Google Calendar, and set it in a .env.local file

```dotenv
CALENDAR_ICS=https://calendar.google.com/calendar/ical/your-email%40gmail.com/private-12345678901234567890123456789012/basic.ics
```

And run the script

```bash
php index.php
```

Tadam !
