<?php

namespace Modules\Book\Domain\Usecase\DeleteBook;


interface IDeleteBookUsecase
{
    public function execute(DeleteBookInputModel $inputModel): void;
}
