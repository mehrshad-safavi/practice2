<?php

namespace Modules\Book\Domain\Usecase\DeleteBook;

class DeleteBookInputModel
{
    public int $bookId;
    public int $libraryId;

    public function __construct(int $bookId, int $libraryId)
    {
        $this->bookId = $bookId;
        $this->libraryId = $libraryId;
    }


}
