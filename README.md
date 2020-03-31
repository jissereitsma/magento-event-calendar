# Magento Events Calendar
This repository holds a repo of Magento events (conferences, meetups,
hackathons) organized world-wide. New events are collected using JSON
files under `data/` while a PHP codebase under `src/` parses these files
into the following feeds:

- An [iCal feed](https://raw.githubusercontent.com/jissereitsma/magento-event-calendar/master/feeds/events.ics) could be configured into Google Calendar, Outlook and other agenda systems.
- A [JSON feed](https://raw.githubusercontent.com/jissereitsma/magento-event-calendar/master/feeds/events.json) could be configured as you see fit.

## Usage in Google Calendar
- Add a new calendar **From URL**
- As URL, use https://raw.githubusercontent.com/jissereitsma/magento-event-calendar/master/feeds/events.json
- Add the new calendar to your Google Calendar
- Wait for 12 hours, because new calendars-from-URL are not updated directly by Google

## Todo
- Prevent unit tests from re-generating feeds
- Add tool to report outdated entries from `data/` 
- Setup a cronjob to automatically parse new accepted entries
- Setup GitHub Actions to test whether new entries are acceptable
