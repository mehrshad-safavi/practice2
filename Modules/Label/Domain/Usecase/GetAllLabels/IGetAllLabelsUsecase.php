<?php

namespace Modules\Label\Domain\Usecase\GetAllLabels;

interface IGetAllLabelsUsecase
{
    public function execute(): GetAllLabelsOutputModel;
}
