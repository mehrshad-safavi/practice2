<?php

namespace Modules\Book\Domain\Usecase\GetAllLabels;

interface IGetAllBooksUsecase
{
    public function execute(): GetAllLabelsOutputModel;
}
