<?php

namespace Modules\Book\Domain\Usecase\DeleteBook;

use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Book\Domain\Validation\BookValidation;

class DeleteBookUsecase implements IDeleteBookUsecase
{
    private IBookPersistence $bookPersistence;
    private BookValidation $bookValidation;

    public function __construct(BookPersistence $bookPersistence, BookValidation $bookValidation)
    {
        $this->bookValidation = $bookValidation;
        $this->bookPersistence = $bookPersistence;
    }

    public function execute(DeleteBookInputModel $inputModel): void
    {
        $book = $this->bookPersistence->findById($inputModel->id);
        $this->bookValidation->checkExists($book);

        $this->bookPersistence->deleteById($book->getId());
    }
}
