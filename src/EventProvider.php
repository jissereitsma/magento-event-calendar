<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar;

use MagentoCommunity\EventCalendar\Model\Event;

/**
 * Class EventProvider
 * @package MagentoCommunity\EventCalendar
 */
class EventProvider
{
    /**
     * @var Reader\Json
     */
    private $jsonReader;

    /**
     * EventProvider constructor.
     */
    public function __construct()
    {
        $this->jsonReader = new Reader\Json;
    }

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        $events = [];

        $eventsData = $this->jsonReader->getData();
        foreach ($eventsData as $eventData) {
            $events[] = new Event($eventData);
        }

        return $events;
    }
}
