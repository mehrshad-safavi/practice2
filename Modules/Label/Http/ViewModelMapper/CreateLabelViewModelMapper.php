<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class CreateLabelViewModelMapper
{
    public static function prepareViewModel(CreateLabelOutputModel $outputModel): LabelViewModel
    {
        return LabelViewModelMapper::prepareViewModel($outputModel->label);
    }
}
