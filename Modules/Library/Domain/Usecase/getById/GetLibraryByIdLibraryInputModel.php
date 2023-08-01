<?php

namespace Modules\Library\Domain\Usecase\getById;

class GetLibraryByIdLibraryInputModel
{
    public int $libraryId;

    public function __construct(int $libraryId)
    {
        $this->libraryId = $libraryId;
    }


}
