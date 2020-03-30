<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Test\Unit\Feed;

use MagentoCommunity\EventCalendar\Feed\ICalFeed;
use MagentoCommunity\EventCalendar\Feed\JsonFeed;
use PHPUnit\Framework\TestCase;

class ICalFeedTest extends TestCase
{
    public function testHelloWorld()
    {
        $icalFeed = $this->getICalFeed();
        $result = $icalFeed->create();
        $this->assertTrue($result);
    }

    private function getICalFeed(): ICalFeed
    {
        return new ICalFeed;
    }
}
