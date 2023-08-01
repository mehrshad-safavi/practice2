<?php

namespace Modules\Book\Domain\Service;

use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;

class BookService implements IBookService
{
    private IBookPersistence $bookPersistence;

    public function __construct(BookPersistence $bookPersistence)
    {
        $this->bookPersistence = $bookPersistence;
    }

    public function inuseBook(int $bookId): bool
    {
        return (bool)$this->bookPersistence->getLibraryByBookId($bookId);
    }
}
