<?php

namespace Modules\Label\Domain\Validation;

use DomainException;
use Modules\Label\Domain\Model\Label;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LabelValidation
{
    public function checkExists(?Label $label): void
    {
        if (!$label) {
            throw new NotFoundHttpException("not found!");
        }
    }

    public function checkUniqueLabel(?Label $label, ?int $id = null): void
    {
        if (!($id ? ($label == null || $label->getId() == $id) : $label == null)) {
            throw new DomainException("duplicate");
        }
    }
}
