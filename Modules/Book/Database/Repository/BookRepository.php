<?php

namespace Modules\Book\Database\Repository;

use Modules\Book\Database\Entity\BookEntity;

class BookRepository implements IBookRepository
{
    public function store(BookEntity $bookEntity): BookEntity
    {
        return (new BookEntity())
            ->updateOrCreate([BookEntity::ID => $bookEntity->getId()], $bookEntity->getAttributes());
    }

    public function findById(int $id): ?BookEntity
    {
        return (new BookEntity())
            ->find($id);
    }

    public function findByTitle(string $title): ?BookEntity
    {
        return (new BookEntity())
            ->where(BookEntity::TITLE, $title)
            ->first();
    }

    public function findByTitleAndPublisher(string $title, $publisher): ?BookEntity
    {
        return (new BookEntity())
            ->where(BookEntity::TITLE, $title)->where(BookEntity::PUBLISHER, $publisher)
            ->first();
    }

    /** @return BookEntity[] */
    public function findAll(): array
    {
        return (new BookEntity())
            ->getModels();
    }
}
