<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Reader;

use MagentoCommunity\EventCalendar\Reader\Json\FileListing;
use RuntimeException;

/**
 * Class Json
 * @package MagentoCommunity\EventCalendar\Reader
 */
class Json
{
    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];
        $files = (new FileListing())->getFiles();

        foreach ($files as $file) {
            $fileData = $this->getDataFromFile($file);
            $data = array_merge($data, $fileData);
        }

        return $data;
    }

    /**
     * @param string $file
     * @return array
     */
    private function getDataFromFile(string $file): array
    {
        $content = file_get_contents($file);
        $data = json_decode($content, true);

        if (!is_array($data)) {
            throw new RuntimeException('Invalid JSON file "'.$file.'"');
        }

        return $data;
    }
}
