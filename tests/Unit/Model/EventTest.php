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
    /**
     * @dataProvider getValidData
     * @param array $data
     * @param bool $equalArrays
     * @param bool $expectException
     */
    public function testConstructEvent(array $data, bool $equalArrays, bool $expectException)
    {
        if ($expectException) {
            $this->expectException(InvalidArgumentException::class);
        }

        $event = $this->createEvent($data);
        $this->assertEquals($data['name'], $event->getName());

        if ($equalArrays) {
            $this->assertEquals($data, $event->toArray());
        } else {
            $this->assertNotEquals($data, $event->toArray());
        }
    }

    /**
     * @return array
     */
    public function getValidData(): array
    {
        return [
            [
                'data' => [
                    'name' => 'Christmas',
                    'startDate' => '2020-12-25',
                    'endDate' => '2020-12-26',
                    'infoLink' => 'http://example.org/',
                ],
                'equalArrays' => true,
                'expectException' => false
            ],
            [
                'data' => [
                    'name' => 'Christmas',
                    'startDate' => '25-12-2020', // Different date notation
                    'endDate' => '26-12-2020',
                    'infoLink' => 'http://example.org/',
                ],
                'equalArrays' => false,
                'expectException' => false
            ]
        ];
    }

    /**
     * @return Event
     */
    private function createEvent(array $data): Event
    {
        return new Event($data);
    }
}
