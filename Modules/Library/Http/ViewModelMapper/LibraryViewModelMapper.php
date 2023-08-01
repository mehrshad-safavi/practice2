<?php

namespace Modules\Library\Http\ViewModelMapper;

use Modules\Book\Http\ViewModelMapper\BookViewModelMapper;
use Modules\Library\Domain\Usecase\getById\GetLibraryByIdLibraryOutputModel;
use Modules\Library\Http\ViewModel\LibraryViewModel;

class LibraryViewModelMapper
{
    public static function prepareViewModel(GetLibraryByIdLibraryOutputModel $outputModel): LibraryViewModel
    {
        return new LibraryViewModel(
            $outputModel->library->getId(),
            $outputModel->library->getTitle(),
            BookViewModelMapper::prepareViewModels($outputModel->library->getBooks()),
        );

    }
}
