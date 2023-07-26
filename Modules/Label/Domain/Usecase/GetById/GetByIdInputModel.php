<?php

namespace Modules\Label\Domain\Usecase\GetById;

class GetByIdInputModel
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
