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
     * Required fields
     */
    const REQUIRED_FIELDS = [
        'name'
    ];

    /**
     * Event constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->validateData($data);
        $this->name = (string)$data['name'] ?? '';
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
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
                throw new InvalidArgumentException('Missing data field "' . $requiredField . '"');
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
}
