<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Test\Unit\Reader;

use MagentoCommunity\EventCalendar\Reader\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function testHelloWorld()
    {
        $json = $this->getJson();
        $data = $json->getData();
        $this->assertNotEmpty($data);
        $this->assertIsArray($data);

        foreach ($data as $name => $value) {
            $this->assertNotEmpty($value);
            $this->assertIsArray($value);
        }
    }

    private function getJson(): Json
    {
        return new Json();
    }
}
