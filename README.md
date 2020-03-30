# Magento Events Calendar
This repository holds a repo of Magento events (conferences, meetups,
hackathons) organized world-wide. New events are collected using JSON
files under `data/` while a PHP codebase under `src/` parses these files
into the following feeds:

- iCal feed for usage with Google Calendar and others
- JSON feed for usage in AJAX tools

## Todo
- Parse files from `data/*.json` via JSON reader into `feeds`
- Add JSON validation for all files
- Add tool to report outdated entries from `data/` 
- Better describe how to feeds in `feeds` could be used
- Setup a cronjob to automatically parse new accepted entries
- Setup GitHub Actions to test whether new entries are acceptable
