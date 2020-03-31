# Magento Events Calendar
This repository holds a repo of Magento events (conferences, meetups,
hackathons) organized world-wide. New events are collected using JSON
files under `data/` while a PHP codebase under `src/` parses these files
into the following feeds:

- iCal feed for usage with Google Calendar and others
- JSON feed for usage in AJAX tools

## Todo
- Prevent unit tests from re-generating feeds
- Add tool to report outdated entries from `data/` 
- Setup a cronjob to automatically parse new accepted entries
- Setup GitHub Actions to test whether new entries are acceptable
