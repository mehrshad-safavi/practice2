<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\GetAllLabels\GetAllLabelsOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;

class GetAllLabelsViewModelMapper
{
    /** @return LabelViewModel[] */
    public static function prepareViewModel(GetAllLabelsOutputModel $outputModel): array
    {
        $labels = [];
        foreach($outputModel->labels as $label){
            $labels[] = new LabelViewModel(
                $label->getId(),
                $label->getTitle(),
                $label->getColor(),
                $label->getStatus()->value,
            );
        }
        return $labels;
    }
}
