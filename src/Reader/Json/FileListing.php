<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Reader\Json;

/**
 * Class FileListing
 * @package MagentoCommunity\EventCalendar\Reader\Json
 */
class FileListing
{
    /**
     * @return string[]
     */
    public function getFiles(): array
    {
        $newFiles = [];
        $files = glob(__DIR__ . '/../../../data/*.json');
        foreach ($files as $file) {
            $newFiles[] = realpath($file);
        }

        return $newFiles;
    }
}
