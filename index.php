<?php

use Lpp\DataSource\JsonFilesystemDataSource;
use Lpp\Service\Storage\ItemService;

require 'vendor/autoload.php';

$itemService = new ItemService(new JsonFilesystemDataSource());
$brands = $itemService->getResultForCollectionId(1315475);

dump($brands);
