<?php

namespace Modules\Label\Domain\Usecase\CreateLabel;

use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Factory\LabelFactory;
use Modules\Label\Domain\Persistence\ILabelPersistence;
use Modules\Label\Domain\Validation\LabelValidation;

class CreateLabelUsecase implements ICreateLabelUsecase
{
    private ILabelPersistence $labelPersistence;
    private LabelValidation $labelValidation;

    public function __construct(LabelPersistence $labelPersistence, LabelValidation $labelValidation)
    {
        $this->labelPersistence = $labelPersistence;
        $this->labelValidation = $labelValidation;
    }

    public function execute(CreateLabelInputModel $inputModel): CreateLabelOutputModel
    {
        $label = $this->labelPersistence->findByTitle($inputModel->title);
        $this->labelValidation->checkUniqueLabel($label);

        $label = LabelFactory::makeNewModel($inputModel->title, $inputModel->color);
        $label = $this->labelPersistence->store($label);

        return new CreateLabelOutputModel($label);
    }
}
