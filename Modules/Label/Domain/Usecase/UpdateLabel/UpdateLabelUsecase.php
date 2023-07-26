<?php

namespace Modules\Label\Domain\Usecase\UpdateLabel;

use Illuminate\Validation\ValidationException;
use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Factory\LabelFactory;
use Modules\Label\Domain\Persistence\ILabelPersistence;
use Modules\Label\Domain\Validation\LabelValidation;

class UpdateLabelUsecase implements IUpdateLabelUsecase
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
    public function execute(UpdateLabelInputModel $inputModel): UpdateLabelOutputModel
    {
        $originalLabel = $this->labelPersistence->findById($inputModel->id);
        $this->labelValidation->checkExists($originalLabel);

        $this->labelValidation->checkUniqueLabel($inputModel->title, $inputModel->id);

        $originalLabel = LabelFactory::updateModel($originalLabel, $inputModel->title, $inputModel->color);
        $originalLabel = $this->labelPersistence->store($originalLabel);

        return new UpdateLabelOutputModel($originalLabel);
    }
}
