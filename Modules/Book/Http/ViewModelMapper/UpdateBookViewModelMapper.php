<?php

namespace Modules\Book\Http\ViewModelMapper;


use Modules\Book\Domain\Usecase\UpdateBook\UpdateBookOutputModel;
use Modules\Book\Http\ViewModel\BookViewModel;

class UpdateBookViewModelMapper
{
    public static function prepareViewModel(UpdateBookOutputModel $outputModel): BookViewModel
    {
        return BookViewModelMapper::prepareViewModel($outputModel->book);
    }
}
