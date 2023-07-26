<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class GetByIdViewModelMapper
{
    public static function prepareViewModel(CreateLabelOutputModel $outputModel): LabelViewModel
    {
        return new LabelViewModel(
            $outputModel->label->getId(),
            $outputModel->label->getTitle(),
            $outputModel->label->getColor(),
            $outputModel->label->getStatus()->value,
        );
    }
}
