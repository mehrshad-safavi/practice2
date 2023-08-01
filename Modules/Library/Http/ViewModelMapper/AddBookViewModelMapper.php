<?php

namespace Modules\Library\Http\ViewModelMapper;

use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelOutputModel;
use Modules\Label\Http\ViewModel\LabelViewModel;
use Modules\Label\Http\ViewModelMapper\LabelViewModelMapper;
use Modules\Library\Domain\Usecase\getById\LibraryBookOutputModel;
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
