<?php

namespace Modules\Book\Http\ViewModelMapper;

use Modules\Book\Domain\Usecase\CreateBook\CreateBookOutputModel;
use Modules\Book\Http\ViewModel\BookViewModel;

class CreateBookViewModelMapper
{
    public static function prepareViewModel(CreateBookOutputModel $outputModel): BookViewModel
    {
        return BookViewModelMapper::prepareViewModel($outputModel->label);
    }
}
