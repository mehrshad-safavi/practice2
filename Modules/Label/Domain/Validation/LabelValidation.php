<?php

namespace Modules\Label\Domain\Validation;

use App\Validations\InputDataValidation;
use Illuminate\Validation\ValidationException;
use Modules\Label\Domain\Model\Label;
use Modules\Label\Domain\Rule\UniqueLabelTitleRule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LabelValidation
{
    private UniqueLabelTitleRule $uniqueLabelTitleRule;

    public function __construct(UniqueLabelTitleRule $uniqueLabelTitleRule)
    {
        $this->uniqueLabelTitleRule = $uniqueLabelTitleRule;
    }

    public function checkExists(?Label $label): void
    {
        if (!$label) {
            throw new NotFoundHttpException("not found!");
        }
    }

    /**
     * @throws ValidationException
     */
    public function checkUniqueLabel(string $title, ?int $id = null): void
    {
        $this->uniqueLabelTitleRule->setId($id);
        InputDataValidation::validate('title', $title, [$this->uniqueLabelTitleRule]);
    }
}
