<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\GetAllLabels\GetAllLabelsOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class GetAllLabelsViewModelMapper
{
    /** @return LabelViewModel[] */
    public static function prepareViewModel(GetAllLabelsOutputModel $outputModel): array
    {
        return LabelViewModelMapper::prepareViewModels($outputModel->labels);
    }
}
