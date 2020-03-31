<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Feed;

use MagentoCommunity\EventCalendar\EventProvider;

/**
 * Class JsonFeed
 * @package MagentoCommunity\EventCalendar\Feed
 */
class JsonFeed
{
    /**
     * @var EventProvider
     */
    private $eventProvider;

    /**
     * JsonFeed constructor.
     */
    public function __construct()
    {
        $this->eventProvider = new EventProvider();
    }

    /**
     * @return bool
     */
    public function create(): bool
    {
        $events = $this->eventProvider->getEvents();

        $data = [];
        foreach ($events as $event) {
            $data[] = $event->toArray();
        }

        $content = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->getOutputFile(), $content);

        return true;
    }

    /**
     * @return string
     */
    private function getOutputFile(): string
    {
        return __DIR__ . '/../../feeds/events.json';
    }
}
