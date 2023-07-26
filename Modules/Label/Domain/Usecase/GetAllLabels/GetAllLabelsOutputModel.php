<?php

namespace Modules\Label\Domain\Usecase\GetAllLabels;

use Modules\Label\Domain\Model\Label;

class GetAllLabelsOutputModel
{
    /** @var Label[] */
    public array $labels;

    /**
     * @param Label[] $labels
     */
    public function __construct(array $labels)
    {
        $this->labels = $labels;
    }
}
