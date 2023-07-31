<?php

namespace Modules\Label\Http\ViewModelMapper;

use Modules\Label\Domain\Model\Label;
use Modules\Label\Http\ViewModel\LabelViewModel;

class LabelViewModelMapper
{
    public static function prepareViewModel(Label $label): LabelViewModel
    {
        return new LabelViewModel(
            $label->getId(),
            $label->getTitle(),
            $label->getColor(),
            $label->getStatus()->value,
        );
    }

    /**
     * @param Label[] $labels
     * @return LabelViewModel[]
     */
    public static function prepareViewModels(array $labels): array
    {
        $labelViewModels = [];
        foreach($labels as $label){
            $labelViewModels[] = LabelViewModelMapper::prepareViewModel($label);
        }
        return $labelViewModels;
    }
}
