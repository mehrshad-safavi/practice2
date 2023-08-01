<?php

namespace Modules\Library\Http\ViewModelMapper;

use Modules\Library\Domain\Usecase\AddBook\LibraryBookOutputModel;
use Modules\Library\Http\ViewModel\AddBookViewModel;

class AddBookViewModelMapper
{
    public static function prepareViewModel(LibraryBookOutputModel $outputModel): AddBookViewModel
    {
        return new AddBookViewModel(
            $outputModel->libraryBook->getBook()->getId(),
            $outputModel->libraryBook->getLibrary()->getId(),
        );

    }
}
