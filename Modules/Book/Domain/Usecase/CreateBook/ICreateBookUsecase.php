<?php

namespace Modules\Book\Domain\Usecase\CreateBook;

interface ICreateBookUsecase
{
    public function execute(CreateBookInputModel $inputModel): CreateBookOutputModel;
}
