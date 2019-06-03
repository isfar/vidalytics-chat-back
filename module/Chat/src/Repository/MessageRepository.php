<?php

namespace Chat\Repository;

use Doctrine\ORM\EntityRepository;
use Chat\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;

class MessageRepository extends EntityRepository
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function save(Message $message, bool $flush = true)
    {
        $this->em->persist($message);

        if ($flush) {
            $this->em->flush();
        }
    }

    public function getLastMessages(int $limit = 10)
    {
        $messages = $this->em->createQueryBuilder()
            ->select('m')
            ->from(Message::class, 'm')
            ->orderBy('m.id', 'DESC')
            ->setFirstResult(0)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $return = [];
        foreach ($messages as $message) {
            $return[] = $message->toArray();
        }

        return $return;
    }
}