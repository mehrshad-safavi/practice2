<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Book\Domain\Usecase\UpdateBook\UpdateLabelOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class UpdateLabelViewModelMapper
{
    public static function prepareViewModel(UpdateLabelOutputModel $outputModel): LabelViewModel
    {
        return LabelViewModelMapper::prepareViewModel($outputModel->label);
    }
}
