<?php

namespace Modules\Label\Domain\Usecase\CreateLabel;

use Modules\Label\Domain\Model\Label;

class CreateLabelOutputModel
{
    public Label $label;

    public function __construct(Label $label)
    {
        $this->label = $label;
    }
}
