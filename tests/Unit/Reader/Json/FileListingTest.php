<?php
declare(strict_types=1);

namespace MagentoCommunity\EventCalendar\Test\Unit\Reader;

use MagentoCommunity\EventCalendar\Reader\Json\FileListing;
use PHPUnit\Framework\TestCase;

class FileListingTest extends TestCase
{
    public function testGetFiles()
    {
        $fileListing = $this->getFileListing();
        $files = $fileListing->getFiles();
        $this->assertNotEmpty($files);
    }

    private function getFileListing(): FileListing
    {
        return new FileListing();
    }
}
