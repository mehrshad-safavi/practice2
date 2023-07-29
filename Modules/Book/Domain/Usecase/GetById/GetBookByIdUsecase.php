<?php

namespace Modules\Book\Domain\Usecase\GetById;

use Modules\Book\Database\Persistence\LabelPersistence;
use Modules\Book\Domain\Persistence\ILabelPersistence;
use Modules\Book\Domain\Usecase\CreateBook\CreateLabelOutputModel;
use Modules\Book\Domain\Validation\LabelValidation;

class GetBookByIdUsecase implements IGetByIdUsecase
{
    private ILabelPersistence $labelPersistence;
    private LabelValidation $labelValidation;

    public function __construct(LabelPersistence $labelPersistence, LabelValidation $labelValidation)
    {
        $this->labelPersistence = $labelPersistence;
        $this->labelValidation = $labelValidation;
    }

    public function execute(GetByIdInputModel $inputModel): CreateLabelOutputModel
    {
        $label = $this->labelPersistence->findById($inputModel->id);
        $this->labelValidation->checkExists($label);

        return new CreateLabelOutputModel($label);
    }
}
