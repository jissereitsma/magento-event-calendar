<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Model;

use InvalidArgumentException;
use MagentoCommunity\EventCalendar\Model\Event\Location;

/**
 * Class AbstractModel
 * @package MagentoCommunity\EventCalendar\Model
 */
abstract class AbstractModel
{
    /**
     * Mapping between fields and methods
     */
    protected $fields = [];

    /**
     * Required fields
     */
    protected $requiredFields = [];

    /**
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * @param array $data
     * @return bool
     */
    public function validateData(array $data): bool
    {
        foreach ($this->requiredFields as $requiredField) {
            if (!isset($data[$requiredField])) {
                throw new InvalidArgumentException('Missing data field "' . $requiredField . '": ' . var_export($data,
                        true));
            }
        }

        return true;
    }

    /**
     * @return array
     */
    protected function getFieldData(): array
    {
        $data = [];
        foreach ($this->fields as $field => $fieldMethod) {
            $value = $this->$fieldMethod();
            if (!empty($value)) {
                $data[$field] = $value;
            }
        }

        return $data;
    }
}
