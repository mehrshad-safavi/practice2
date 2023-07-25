<?php

namespace Modules\Label\Domain\Validation;

use DomainException;
use http\Exception;
use Modules\Label\Domain\Model\Label;

class LabelValidation
{
    public function checkExists(?Label $label): void
    {
        if (!$label) {
            throw new DomainException("No exists");
        }
    }

    public function checkUniqueLabel(?Label $label): void
    {
        if ($label) {
            throw new DomainException("duplicate");
        }
    }
}
