<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Model\Event;

use InvalidArgumentException;
use MagentoCommunity\EventCalendar\Model\AbstractModel;

/**
 * Class Location
 * @package MagentoCommunity\EventCalendar\Model\Event
 */
class Location extends AbstractModel
{
    /**
     * @var string
     */
    private $venue = '';

    /**
     * @var string
     */
    private $address = '';

    /**
     * @var string
     */
    private $city = '';

    /**
     * @var string
     */
    private $country = '';

    /**
     * @var array
     */
    protected $fields = [
        'venue' => 'getVenue',
        'address' => 'getAddress',
        'city' => 'getCity',
        'country' => 'getCountry',
    ];

    /**
     * Required fields
     */
    protected $requiredFields = [
        'venue',
    ];

    /**
     * Event constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->venue = isset($data['name']) ? (string)$data['venue'] : '';
        $this->address = isset($data['address']) ? (string)$data['address'] : '';
        $this->city = isset($data['city']) ? (string)$data['city'] : '';
        $this->country = isset($data['country']) ? (string)$data['country'] : '';
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->getFieldData();
    }

    /**
     * @return string
     */
    public function getVenue(): string
    {
        return $this->venue;
    }

    /**
     * @return string
     */
    public function getFullAddress(): string
    {
        $parts = [];
        if ($this->venue) $parts[] = $this->getVenue();
        if ($this->address) $parts[] = $this->getAddress();
        if ($this->city) $parts[] = $this->getCity();
        if ($this->country) $parts[] = $this->getCountry();

        return implode(', ', $parts);
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
