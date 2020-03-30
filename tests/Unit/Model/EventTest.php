<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Test\Unit\Model;

use InvalidArgumentException;
use MagentoCommunity\EventCalendar\Model\Event;
use PHPUnit\Framework\TestCase;

/**
 * Class EventTest
 * @package MagentoCommunity\EventCalendar\Test\Unit\Model
 */
class EventTest extends TestCase
{
    public function testConstructEvent()
    {
        $event = $this->createEvent(['name' => 'Hello']);
        $this->assertEquals('Hello', $event->getName());
        $this->assertEquals(['name' => 'Hello'], $event->toArray());
    }

    public function testMissingEventArguments()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->createEvent(['name2' => 'Hello']);
    }

    /**
     * @return Event
     */
    private function createEvent(array $data): Event
    {
        return new Event($data);
    }
}
