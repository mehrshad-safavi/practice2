<?php

namespace Modules\Book\Domain\Model;

use DateTime;
use Modules\Label\Domain\Model\Label;

class Book
{
    private ?int $id;
    private string $title;
    private string $publisher;
    private Label $label;

    private DateTime $createdAt;
    private DateTime $updatedAt;
    private DateTime $deletedAt;

    /**************************** setters **************************/
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function setLabel(Label $label): void
    {
        $this->label = $label;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function setDeletedAt(DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /******************** getters ********************/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function getPublisher(): string
    {
        return $this->publisher;
    }


    public function getLabel(): Label
    {
        return $this->label;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }
}
