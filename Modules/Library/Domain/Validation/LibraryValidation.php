<?php

namespace Modules\Library\Domain\Validation;

use Exception;
use Modules\Book\Domain\Service\BookService;
use Modules\Book\Domain\Service\IBookService;
use Modules\Library\Domain\Model\Library;
use Modules\Library\Domain\Model\LibraryBook;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LibraryValidation
{
    private IBookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function checkExists(?Library $library): void
    {
        if (!$library) {
            throw new NotFoundHttpException("not found!");
        }
    }

    public function checkExistsBookInLibrary(?LibraryBook $libraryBook): void
    {
        if (!$libraryBook) {
            throw new NotFoundHttpException("not found!");
        }
    }

    /**
     * @throws Exception
     */
    public function checkInuseBooK(int $bookId): void
    {
        if($this->bookService->inuseBook($bookId)){
            throw new Exception('This book exists in another library!');
        }
    }
}
