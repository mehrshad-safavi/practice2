<?php

namespace Modules\Book\Domain\Usecase\GetAllBooks;

use Modules\Book\Domain\Model\Book;

class GetAllBooksOutputModel
{
    /** @var Book[] */
    public array $books;

    /**
     * @param Book[] $books
     */
    public function __construct(array $books)
    {
        $this->books = $books;
    }
}
