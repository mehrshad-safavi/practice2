<?php

namespace Modules\Library\Domain\Usecase\addBook;

use Modules\Library\Domain\Model\LibraryBook;

class LibraryBookOutputModel
{
    public LibraryBook $libraryBook;

    public function __construct(LibraryBook $libraryBook)
    {
        $this->libraryBook = $libraryBook;
    }


}
