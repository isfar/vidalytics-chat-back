<?php

namespace Chat\Model;

use Chat\Repository\MessageRepository;
use Chat\Entity\Message;

class MessageModel
{
    /** @var MessageRepository */
    private $messageRepository;

    public function __construct(
        MessageRepository $messageRepository
    ) {
        $this->messageRepository = $messageRepository;
    }

    public function save(Message $message)
    {
        $this->messageRepository->save($message);
    }

    public function getLastTenMessages()
    {
        return $this->messageRepository->getLastMessages($maxResults = 10);
    }
}