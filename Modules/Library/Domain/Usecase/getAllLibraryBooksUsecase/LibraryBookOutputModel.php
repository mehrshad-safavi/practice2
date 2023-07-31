<?php

namespace Modules\Library\Domain\Usecase\getAllLibraryBooksUsecase;

use Modules\Book\Domain\Model\Book;
use Modules\Library\Domain\Model\Library;

class LibraryBookOutputModel
{
    /** @var Book[] */
    public array $books;

    public Library $library;

    /**
     * @param Book[] $books
     * @param Library $library
     */
    public function __construct(array $books, Library $library)
    {
        $this->books = $books;
        $this->library = $library;
    }


}
