<?php

namespace Modules\Label\Domain\Rule;

use Illuminate\Contracts\Validation\Rule;
use Modules\Label\Database\Persistence\LabelPersistence;
use Modules\Label\Domain\Persistence\ILabelPersistence;

class UniqueLabelTitleRule implements Rule
{
    private ILabelPersistence $labelPersistence;
    private ?int $id = null;

    public function __construct(LabelPersistence $labelPersistence)
    {
        $this->labelPersistence = $labelPersistence;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function passes($attribute, $value): bool
    {
        $label = $this->labelPersistence->findByTitle($value);
        return $this->id ? ($label == null || $label->getId() == $this->id) : $label == null;
    }

    public function message(): string
    {
        return __('validation.unique');
    }
}
