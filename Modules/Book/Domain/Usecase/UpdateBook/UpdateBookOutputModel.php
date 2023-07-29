<?php

namespace Modules\Book\Domain\Usecase\UpdateBook;

use Modules\Book\Domain\Model\Book;

class UpdateBookOutputModel
{
    public Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }
}
