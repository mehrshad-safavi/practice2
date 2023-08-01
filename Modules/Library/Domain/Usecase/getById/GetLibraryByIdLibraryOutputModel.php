<?php

namespace Modules\Library\Domain\Usecase\getById;

use Modules\Book\Domain\Model\Book;
use Modules\Library\Domain\Model\Library;

class GetLibraryByIdLibraryOutputModel
{
//    public int $id;
//    public string $title;
//    /** @var Book[] */
//    public array $books;

    public Library $library;

    public function __construct(Library $library)
    {
        $this->library = $library;
//        $this->id = $library->getId();
//        $this->title = $library->getTitle();
//        $this->books = $library->getBooks();
    }
}
