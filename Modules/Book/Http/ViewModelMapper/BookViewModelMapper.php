<?php

namespace Modules\Book\Http\ViewModelMapper;

use Modules\Book\Domain\Model\Book;
use Modules\Book\Http\ViewModel\BookViewModel;
use Modules\Library\Http\ViewModelMapper\LabelViewModelMapper;

class BookViewModelMapper
{
    public static function prepareViewModel(Book $book): BookViewModel
    {
        return new BookViewModel(
            $book->getId(),
            $book->getTitle(),
            $book->getPublisher(),
            LabelViewModelMapper::prepareViewModel($book->getLabel()),
        );
    }

    /**
     * @param Book[] $books
     * @return BookViewModel[]
     */
    public static function prepareViewModels(array $books): array
    {
        $bookViewModels = [];
        foreach ($books as $book) {
            $bookViewModels[] = self::prepareViewModel($book);
        }
        return $bookViewModels;
    }
}
