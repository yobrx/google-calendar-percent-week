# Google Calendar Display by Percent and Week

This script display a Google Calendar with the percent of time spent on each event and the week number, grouped by week and name.
```
Total duration of events per week :

Week 2025-03 (35.75 hours) :
  - A : 9 hours - 25%
  - B : 26.75 hours - 75%

Week 2025-04 (34.25 hours) :
  - A : 32.5 hours - 95%
  - C : 0.75 hours - 2%
  - B : 1 hours - 3%

Week 2025-05 (36.25 hours) :
  - A : 3.75 hours - 10%
  - B : 28.75 hours - 79%
  - C : 1.75 hours - 5%
  - D : 0.75 hours - 2%
  - E : 1.25 hours - 3%

Week 2025-06 (36.75 hours) :
  - A : 25 hours - 68%
  - B : 4.25 hours - 12%
  - C : 7.5 hours - 20%
```


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
