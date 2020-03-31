<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Model;

use InvalidArgumentException;

/**
 * Class Event
 * @package MagentoCommunity\EventCalendar\Model
 */
class Event
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
     * Required fields
     */
    const REQUIRED_FIELDS = [
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
        $this->name = (string)$data['name'] ?? '';
        $this->startDate = (string)$data['startDate'] ?? '';
        $this->endDate = (string)$data['endDate'] ?? '';
        $this->infoLink = (string)$data['infoLink'] ?? '';
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
            'infoLink' => $this->getInfoLink(),
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validateData(array $data): bool
    {
        foreach (self::REQUIRED_FIELDS as $requiredField) {
            if (!isset($data[$requiredField])) {
                throw new InvalidArgumentException('Missing data field "' . $requiredField . '": '.var_export($data, true));
            }
        }

        return true;
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
}
