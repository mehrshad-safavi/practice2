<?php

namespace Modules\Label\Domain\Usecase\CreateLabel;

use Illuminate\Validation\ValidationException;
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

    /**
     * @throws ValidationException
     */
    public function execute(CreateLabelInputModel $inputModel): CreateLabelOutputModel
    {
        $this->labelValidation->checkUniqueLabel($inputModel->title);

        $label = LabelFactory::makeNewModel($inputModel->title, $inputModel->color);
        $label = $this->labelPersistence->store($label);

        return new CreateLabelOutputModel($label);
    }
}
