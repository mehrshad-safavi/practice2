<?php

namespace Modules\Book\Domain\Usecase\GetById;

use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookOutputModel;
use Modules\Book\Domain\Validation\BookValidation;

class GetBookByIdUsecase implements IGetBookByIdUsecase
{
    private IBookPersistence $labelPersistence;
    private BookValidation $labelValidation;

    public function __construct(BookPersistence $labelPersistence, BookValidation $labelValidation)
    {
        $this->labelPersistence = $labelPersistence;
        $this->labelValidation = $labelValidation;
    }

    public function execute(GetBookByIdInputModel $inputModel): CreateBookOutputModel
    {
        $label = $this->labelPersistence->findById($inputModel->id);
        $this->labelValidation->checkExists($label);

        return new CreateBookOutputModel($label);
    }
}
