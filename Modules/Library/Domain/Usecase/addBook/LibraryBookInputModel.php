<?php

namespace Modules\Library\Domain\Usecase\addBook;

use Modules\Book\Domain\Model\Book;

class LibraryBookInputModel
{
    public int $bookId;
    public int $libraryId;

    public function __construct(int $bookId, int $libraryId)
    {
        $this->bookId = $bookId;
        $this->libraryId = $libraryId;
    }


}
