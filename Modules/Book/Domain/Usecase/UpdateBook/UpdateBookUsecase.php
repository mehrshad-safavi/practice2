<?php

namespace Modules\Book\Domain\Usecase\UpdateBook;

use Illuminate\Validation\ValidationException;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Factory\BookFactory;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Book\Domain\Validation\BookValidation;
use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Persistence\ILabelPersistence;
use Modules\Label\Domain\Validation\LabelValidation;

class UpdateBookUsecase implements IUpdateBookUsecase
{
    private IBookPersistence $bookPersistence;
    private BookValidation $bookValidation;
    private ILabelPersistence $labelPersistence;
    private LabelValidation $labelValidation;

    public function __construct(LabelPersistence $labelPersistence, LabelValidation $labelValidation,
    BookPersistence $bookPersistence, BookValidation $bookValidation)
    {
        $this->labelPersistence = $labelPersistence;
        $this->labelValidation = $labelValidation;
        $this->bookValidation = $bookValidation;
        $this->bookPersistence = $bookPersistence;
    }

    /**
     * @throws ValidationException
     */
    public function execute(UpdateBookInputModel $inputModel): UpdateBookOutputModel
    {
        $label = $this->labelPersistence->findById($inputModel->labelId);
        $this->labelValidation->checkExists($label);

        $this->bookValidation->checkUniqueBook($inputModel->title, $inputModel->publisher, $inputModel->id);

        $book = $this->bookPersistence->findById($inputModel->id);
        $book = BookFactory::updateModel($book, $inputModel->title, $inputModel->publisher, $label);
        $book = $this->bookPersistence->store($book);

        return new UpdateBookOutputModel($book);
    }
}
