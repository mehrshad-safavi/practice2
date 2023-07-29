<?php

namespace Modules\Book\Domain\Usecase\GetById;


use Modules\Book\Domain\Usecase\CreateBook\CreateBookOutputModel;

interface IGetBookByIdUsecase
{
    public function execute(GetBookByIdInputModel $inputModel): CreateBookOutputModel;
}
