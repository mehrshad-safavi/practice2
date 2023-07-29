<?php

namespace Modules\Book\Domain\Usecase\GetById;

class GetBookByIdInputModel
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
