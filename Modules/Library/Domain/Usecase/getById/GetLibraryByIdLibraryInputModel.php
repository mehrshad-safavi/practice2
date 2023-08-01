<?php

namespace Modules\Library\Domain\Usecase\getById;

use Modules\Book\Domain\Model\Book;

class GetLibraryByIdLibraryInputModel
{
    public int $libraryId;

    public function __construct(int $libraryId)
    {
        $this->libraryId = $libraryId;
    }


}
