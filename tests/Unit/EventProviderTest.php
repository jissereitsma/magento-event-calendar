<?php

declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Test\Unit\Reader;

use MagentoCommunity\EventCalendar\EventProvider;
use MagentoCommunity\EventCalendar\Model\Event;
use PHPUnit\Framework\TestCase;

class EventProviderTest extends TestCase
{
    public function testGetData()
    {
        $eventProvider = $this->getEventProvider();
        $events = $eventProvider->getEvents();
        $this->assertNotEmpty($events);

        foreach ($events as $event) {
            $this->assertInstanceOf(Event::class, $event);
        }
    }

    /**
     * @return EventProvider
     */
    private function getEventProvider(): EventProvider
    {
        return new EventProvider();
    }
}
