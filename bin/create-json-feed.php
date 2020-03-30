<?php
declare(strict_types=1);

use MagentoCommunity\EventCalendar\Feed\JsonFeed;

require_once __DIR__ . '/../vendor/autoload.php';

$jsonFeed = new JsonFeed();
$jsonFeed->create();
