<?php

namespace Modules\Book\Domain\Usecase\GetAllBooks;

use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;

class GetAllBooksUsecase implements IGetAllBooksUsecase
{
    private IBookPersistence $labelPersistence;

    public function __construct(BookPersistence $labelPersistence)
    {
        $this->labelPersistence = $labelPersistence;
    }

    public function execute(): GetAllBooksOutputModel
    {
        $labels = $this->labelPersistence->findAll();

        return new GetAllBooksOutputModel($labels);

    }
}
