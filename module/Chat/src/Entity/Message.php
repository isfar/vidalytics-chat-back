<?php

namespace Chat\Entity;

/**
 * @Entity
 * @Table(name="messages")
 */
class Message
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $id;
    /** @Column(type="datetime") */
    private $datetime;
    /** @Column(type="string") */
    private $text;

    /**
     * @return int
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */ 
    public function getDatetime(): \DateTime
    {
        return $this->datetime;
    }

    /**
     * @return  self
     */ 
    public function setDatetime(\DateTime $datetime): self
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * @return string
     */ 
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return  self
     */ 
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'text' => $this->getText(),
            'datetime' => $this->getDatetime()->format(\DateTime::ATOM),
        ];
    }
}