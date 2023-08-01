<?php

namespace Modules\Library\Domain\Usecase\removeBook;

class RemoveBookInputModel
{
    public int $bookId;
    public int $libraryId;

    public function __construct(int $bookId, int $libraryId)
    {
        $this->bookId = $bookId;
        $this->libraryId = $libraryId;
    }

}
