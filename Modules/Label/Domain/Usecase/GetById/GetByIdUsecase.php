<?php

namespace Modules\Label\Domain\Usecase\GetById;

use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Persistence\ILabelPersistence;
use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelOutputModel;
use Modules\Label\Domain\Validation\LabelValidation;

class GetByIdUsecase implements IGetByIdUsecase
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
