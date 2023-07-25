<?php

namespace Modules\Label\Domain\Usecase\CreateLabel;

interface ICreateLabelUsecase
{
    public function execute(CreateLabelInputModel $inputModel): CreateLabelOutputModel;
}
