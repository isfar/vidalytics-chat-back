<?php

namespace Chat\Controller\Factory;

use Interop\Container\ContainerInterface;
use Chat\Controller\ChatController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Chat\Model\MessageModel;

class ChatControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new ChatController($container->get(MessageModel::class));
    }
}