<?php

namespace Modules\Label\Domain\Usecase\UpdateLabel;

use Modules\Label\Domain\Model\Label;

class UpdateLabelOutputModel
{
    public Label $label;

    public function __construct(Label $label)
    {
        $this->label = $label;
    }
}
