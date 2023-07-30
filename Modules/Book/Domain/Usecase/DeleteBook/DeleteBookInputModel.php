<?php

namespace Modules\Book\Domain\Usecase\DeleteBook;

class DeleteBookInputModel
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
