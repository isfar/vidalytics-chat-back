<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

require_once 'vendor/autoload.php';

$config = Setup::createAnnotationMetadataConfiguration(
    [
        __DIR__ . "/module/Chat/src/Entity",
    ],
    true
);

$em = EntityManager::create(
    [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . "/data/db.sqlite"
    ],
    $config
);

$helperSet = new HelperSet([
    'db' => new ConnectionHelper($em->getConnection()),
    'em' => new EntityManagerHelper($em)
]);

return $helperSet;
