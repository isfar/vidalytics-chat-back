<?php

namespace Chat\Service\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ConfigInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config = $container->get('Config');
        $dbConfig = $config['db'];
        $dirs = $config['doctrine']['dirs'];

        $annotationConfig = Setup::createAnnotationMetadataConfiguration($dirs, true);

        return EntityManager::create(
            $dbConfig,
            $annotationConfig
        );
    }
}

