<?php

namespace Modules\Book\Domain\Usecase\UpdateBook;


interface IUpdateBookUsecase
{
    public function execute(UpdateBookInputModel $inputModel): UpdateBookOutputModel;
}
