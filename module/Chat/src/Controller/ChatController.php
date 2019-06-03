<?php

namespace Chat\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Chat\Model\MessageModel;
use Zend\Json\Json;
use Chat\Entity\Message;

class ChatController extends AbstractRestfulController
{
    /** @var MessageModel */
    private $messageModel;

    public function __construct(MessageModel $messageModel)
    {
        $this->messageModel = $messageModel;
    }

    public function getList()
    {
        $messages = $this->messageModel->getLastTenMessages();
        return new JsonModel($messages);
    }

    public function create($data)
    {
        $json = Json::decode($this->getRequest()->getContent(), Json::TYPE_ARRAY);

        if (! isset($json['text'])) {
            $this->getResponse()->setStatusCode(400);
            return new JsonModel([
                'message' => 'Invalid Request',
            ]);
        }

        $message = new Message();
        $message->setDatetime(new \DateTime('now'))
            ->setText($json['text']);

        $this->messageModel->save($message);

        return new JsonModel($message->toArray());
    }
}
