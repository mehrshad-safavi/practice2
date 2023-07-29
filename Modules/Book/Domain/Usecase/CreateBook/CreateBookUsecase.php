<?php

namespace Modules\Book\Domain\Usecase\CreateBook;

use Illuminate\Validation\ValidationException;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Factory\BookFactory;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Book\Domain\Validation\BookValidation;
use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Persistence\ILabelPersistence;
use Modules\Label\Domain\Validation\LabelValidation;

class CreateBookUsecase implements ICreateBookUsecase
{
    private IBookPersistence $bookPersistence;
    private ILabelPersistence $labelPersistence;
    private LabelValidation $labelValidation;
    private BookValidation $bookValidation;

    public function __construct(LabelPersistence $labelPersistence, BookPersistence $bookPersistence,
                                LabelValidation  $labelValidation, BookValidation $bookValidation)
    {
        $this->labelPersistence = $labelPersistence;
        $this->bookPersistence = $bookPersistence;
        $this->labelValidation = $labelValidation;
        $this->bookValidation = $bookValidation;
    }

    /**
     * @throws ValidationException
     */
    public function execute(CreateBookInputModel $inputModel): CreateBookOutputModel
    {
        $label = $this->labelPersistence->findById($inputModel->labelId);
        $this->labelValidation->checkExists($label);

        $this->bookValidation->checkUniqueBook($inputModel->title, $inputModel->publisher);

        $book = BookFactory::makeNewModel($inputModel->title, $inputModel->publisher, $label);

        $book = $this->bookPersistence->store($book);

        return new CreateBookOutputModel($book);
    }
}
