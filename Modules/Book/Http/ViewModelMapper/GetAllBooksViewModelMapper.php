<?php

namespace Modules\Book\Http\ViewModelMapper;

use Modules\Book\Domain\Usecase\GetAllBooks\GetAllBooksOutputModel;
use Modules\Book\Http\ViewModel\BookViewModel;

class GetAllBooksViewModelMapper
{
    /** @return BookViewModel[] */
    public static function prepareViewModel(GetAllBooksOutputModel $outputModel): array
    {
        return BookViewModelMapper::prepareViewModels($outputModel->books);
    }
}
