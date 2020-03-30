<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Feed;

use Eluceo\iCal\Component\Calendar;
use Eluceo\iCal\Component\Event;
use MagentoCommunity\EventCalendar\EventProvider;

class ICalFeed
{
    public function create()
    {
        $calendar = new Calendar('www.magento.com/events');

        $event = new Event();
        $event
            ->setDtStart(new \DateTime('2012-12-24'))
            ->setDtEnd(new \DateTime('2012-12-24'))
            ->setNoTime(true)
            ->setSummary('Christmas');
        $calendar->addComponent($event);

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
