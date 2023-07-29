<?php

namespace Modules\Label\Domain\Usecase\UpdateLabel;

interface IUpdateLabelUsecase
{
    public function execute(UpdateLabelInputModel $inputModel): UpdateLabelOutputModel;
}
