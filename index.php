<?php

use Lpp\DataSource\JsonFilesystemDataSource;
use Lpp\Service\Storage\ItemService;
use Lpp\Service\UnorderedBrandService;

require 'vendor/autoload.php';

$itemService = new ItemService(new JsonFilesystemDataSource());
$unorderedBrandService = new UnorderedBrandService($itemService);
dump($unorderedBrandService->getBrandsForCollection("winter"));
