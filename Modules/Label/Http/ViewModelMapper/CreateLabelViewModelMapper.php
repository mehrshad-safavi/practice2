<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class CreateLabelViewModelMapper
{
    public static function prepareViewModel(CreateLabelOutputModel $outPutModel): LabelViewModel
    {
        return new LabelViewModel(
            $outPutModel->label->getId(),
            $outPutModel->label->getTitle(),
            $outPutModel->label->getColor(),
            $outPutModel->label->getStatus()->value,
        );
    }
}
