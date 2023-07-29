<?php

namespace Modules\Book\Domain\Usecase\GetAllBooks;

interface IGetAllBooksUsecase
{
    public function execute(): GetAllBooksOutputModel;
}
