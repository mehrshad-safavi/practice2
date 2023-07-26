<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\UpdateLabel\UpdateLabelOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class UpdateLabelViewModelMapper
{
    public static function prepareViewModel(UpdateLabelOutputModel $outputModel): LabelViewModel
    {
        return LabelViewModelMapper::prepareViewModel($outputModel->label);
    }
}
