<?php

namespace Modules\Library\Domain\Model;

use DateTime;
use Modules\Book\Domain\Model\Book;

class LibraryBook
{
    private ?int $id;
    private Book $book;
    private Library $library;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function setBook(Book $book): void
    {
        $this->book = $book;
    }

    public function getLibrary(): Library
    {
        return $this->library;
    }

    public function setLibrary(Library $library): void
    {
        $this->library = $library;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
