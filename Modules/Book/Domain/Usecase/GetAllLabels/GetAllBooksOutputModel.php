<?php

namespace Modules\Book\Domain\Usecase\GetAllLabels;

use Modules\Book\Domain\Model\Label;

class GetAllBooksOutputModel
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
