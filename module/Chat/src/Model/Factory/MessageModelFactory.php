<?php

namespace Chat\Model\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Chat\Model\MessageModel;
use Chat\Respository\MessageRepository;
use Interop\Container\ContainerInterface;

class MessageModelFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new MessageModel($container->get(MessageRepository::class));
    }
}