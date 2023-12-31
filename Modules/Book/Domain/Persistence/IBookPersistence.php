<?php

namespace Modules\Book\Domain\Persistence;

use Modules\Book\Domain\Model\Book;
use Modules\Library\Domain\Model\Library;

interface IBookPersistence
{
    public function store(Book $book): Book;

    public function findById(int $id): ?Book;

    public function findByTitle(string $title): ?Book;

    /** @return Book[] */
    public function findAll(): array;

    public function deleteById(int $id): void;

    public function findByTitleAndPublisher(string $title, string $publisher): ?Book;

    public function findByPublisher(string $publisher): ?Book;

    public function getLibraryByBookId(int $bookId): ?Library;

}
