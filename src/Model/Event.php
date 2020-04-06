<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Model;

use InvalidArgumentException;
use MagentoCommunity\EventCalendar\Model\Event\Location;

/**
 * Class Event
 * @package MagentoCommunity\EventCalendar\Model
 */
class Event extends AbstractModel
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $endDate;

    /**
     * @var string
     */
    private $infoLink;

    /**
     * @var Location
     */
    private $location;

    /**
     * Fields
     */
    protected $fields = [
        'name' => 'getName',
        'startDate' => 'getStartDate',
        'endDate' => 'getEndDate',
        'infoLink' => 'getInfoLink',
    ];

    /**
     * Required fields
     */
    protected $requiredFields = [
        'name',
        'startDate',
        'endDate',
        'infoLink',
    ];

    /**
     * Event constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->validateData($data);
        $this->name = isset($data['name']) ? (string)$data['name'] : '';
        $this->startDate = isset($data['startDate']) ? (string)$data['startDate'] : '';
        $this->endDate = isset($data['endDate']) ? (string)$data['endDate'] : '';
        $this->infoLink = isset($data['infoLink']) ? (string)$data['infoLink'] : '';

        if (!empty($data['location'])) {
            $this->location = new Location($data['location']);
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = $this->getFieldData();
        if ($this->location instanceof Location) {
            $data['location'] = $this->location->toArray();
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $format
     * @return string
     */
    public function getStartDate(string $format = 'Y-m-d'): string
    {
        return date($format, strtotime($this->startDate));
    }

    /**
     * @return string
     */
    public function getEndDate(string $format = 'Y-m-d'): string
    {
        return date($format, strtotime($this->endDate));
    }

    /**
     * @return string
     */
    public function getInfoLink(): string
    {
        return $this->infoLink;
    }

    /**
     * @return bool
     */
    public function hasLocation(): bool
    {
        return ($this->location instanceof Location);
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }
}
