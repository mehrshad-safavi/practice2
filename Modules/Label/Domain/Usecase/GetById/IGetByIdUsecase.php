<?php

namespace Modules\Label\Domain\Usecase\GetById;

use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelOutputModel;

interface IGetByIdUsecase
{
    public function execute(GetByIdInputModel $inputModel): CreateLabelOutputModel;
}
