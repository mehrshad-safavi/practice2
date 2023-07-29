<?php

namespace Modules\Book\Http\ViewModelMapper;

use Modules\Book\Domain\Model\Book;
use Modules\Book\Http\ViewModel\BookViewModel;

class BookViewModelMapper
{
    public static function prepareViewModel(Book $label): BookViewModel
    {
        return new BookViewModel(
            $label->getId(),
            $label->getTitle(),
            $label->getPublisher(),
            $label->getLabel()->getId(),
        );
    }

    /**
     * @param Book[] $books
     * @return BookViewModel[]
     */
    public static function prepareViewModels(array $books): array
    {
        $bookViewModels = [];
        foreach($books as $book){
            $bookViewModels[] = self::prepareViewModel($book);
        }
        return $bookViewModels;
    }
}
