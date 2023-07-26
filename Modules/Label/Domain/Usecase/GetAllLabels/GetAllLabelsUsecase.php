<?php

namespace Modules\Label\Domain\Usecase\GetAllLabels;

use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Factory\LabelFactory;
use Modules\Label\Domain\Persistence\ILabelPersistence;
use Modules\Label\Domain\Validation\LabelValidation;

class GetAllLabelsUsecase implements IGetAllLabelsUsecase
{
    private ILabelPersistence $labelPersistence;

    public function __construct(LabelPersistence $labelPersistence)
    {
        $this->labelPersistence = $labelPersistence;
    }

    public function execute(): GetAllLabelsOutputModel
    {
        $labels = $this->labelPersistence->findAll();

        return new GetAllLabelsOutputModel($labels);

    }
}
