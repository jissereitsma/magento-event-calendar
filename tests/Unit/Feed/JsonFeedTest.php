<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Test\Unit\Feed;

use MagentoCommunity\EventCalendar\Feed\JsonFeed;
use PHPUnit\Framework\TestCase;

class JsonFeedTest extends TestCase
{
    public function testHelloWorld()
    {
        $jsonFeed = $this->getJsonFeed();
        $result = $jsonFeed->create();
        $this->assertTrue($result);
    }

    private function getJsonFeed(): JsonFeed
    {
        return new JsonFeed;
    }
}
