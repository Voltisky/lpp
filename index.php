<?php

use Lpp\DataSource\JsonFilesystemDataSource;
use Lpp\Service\NameOrderedBrandService;
use Lpp\Service\Storage\ItemService;
use Lpp\Service\UnorderedBrandService;

require 'vendor/autoload.php';

$itemService = new ItemService(new JsonFilesystemDataSource());
$unorderedBrandService = new UnorderedBrandService($itemService);
dump($unorderedBrandService->getBrandsForCollection("winter"));

$nameOrderedBrandService = new NameOrderedBrandService($itemService);
dump($nameOrderedBrandService->getBrandsForCollection("summer"));
