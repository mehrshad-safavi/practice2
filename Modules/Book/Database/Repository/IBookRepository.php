<?php

namespace Modules\Book\Database\Repository;

use Modules\Book\Database\Entity\BookEntity;

interface IBookRepository
{
    public function store(BookEntity $bookEntity): BookEntity;

    public function findById(int $id): ?BookEntity;

    public function findByTitle(string $title): ?BookEntity;

    /** @return BookEntity[] */
    public function findAll(): array;
}
