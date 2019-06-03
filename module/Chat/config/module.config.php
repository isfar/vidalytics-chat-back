<?php

namespace Chat;

use Zend\Router\Http\Literal;
use Chat\Controller\ChatController;
use Doctrine\ORM\EntityManagerInterface;
use Chat\Service\Factory\EntityManagerFactory;
use Chat\Controller\Factory\ChatControllerFactory;
use Chat\Respository\MessageRepository;
use Chat\Repository\Factory\MessageRepositoryFactory;
use Chat\Model\MessageModel;
use Chat\Model\Factory\MessageModelFactory;

return [
    'service_manager' => [
        'factories' => [
            EntityManagerInterface::class => EntityManagerFactory::class,
            MessageRepository::class => MessageRepositoryFactory::class,
            MessageModel::class => MessageModelFactory::class,
        ]
    ],
    'controllers' => [
        'factories' => [
            ChatController::class => ChatControllerFactory::class,
        ]
    ],
    'router' => [
        'routes' => [
            'chat' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/chat',
                    'defaults' => [
                        'controller' => ChatController::class,
                    ],
                ]
            ]
        ]
    ],
    'doctrine' => [
        'dirs' => [
            __DIR__ . "/src/Entity",
        ],
    ],
    'db' => [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . "/../../../data/db.sqlite",
    ],
];