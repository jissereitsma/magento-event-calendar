<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Feed;

use DateTime;
use Eluceo\iCal\Component\Calendar;
use Eluceo\iCal\Component\Event;
use Eluceo\iCal\Property\Event\Geo;
use Exception;
use MagentoCommunity\EventCalendar\EventProvider;

/**
 * Class ICalFeed
 * @package MagentoCommunity\EventCalendar\Feed
 */
class ICalFeed
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
     * @throws Exception
     */
    public function create()
    {
        $events = $this->eventProvider->getEvents();
        $calendar = new Calendar('www.magento.com/events');

        foreach ($events as $event) {
            $calendarEvent = new Event();
            $calendarEvent
                ->setDtStart(new DateTime($event->getStartDate()))
                ->setDtEnd(new DateTime($event->getEndDate()))
                ->setUrl($event->getInfoLink())
                ->setNoTime(true)
                ->setSummary($event->getName());

            if ($event->hasLocation()) {
                $calendarEvent->setLocation($event->getLocation()->getFullAddress());
            }

            $calendar->addComponent($calendarEvent);
        }

        $content = $calendar->render();
        file_put_contents($this->getOutputFile(), $content);

        return true;
    }

    /**
     * @return string
     */
    private function getOutputFile(): string
    {
        return __DIR__ . '/../../feeds/events.ics';
    }
}
