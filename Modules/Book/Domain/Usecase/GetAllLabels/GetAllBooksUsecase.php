<?php

namespace Modules\Book\Domain\Usecase\GetAllLabels;

use Modules\Book\Database\Persistence\LabelPersistence;
use Modules\Book\Domain\Factory\LabelFactory;
use Modules\Book\Domain\Persistence\ILabelPersistence;
use Modules\Book\Domain\Validation\LabelValidation;

class GetAllBooksUsecase implements IGetAllBooksUsecase
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
