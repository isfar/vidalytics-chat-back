<?php

namespace Chat\Repository\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Chat\Repository\MessageRepository;
use Zend\ServiceManager\Factory\FactoryInterface;

class MessageRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new MessageRepository(
            $container->get(EntityManagerInterface::class)
        );
    }
}