<?php

namespace Modules\Library\Domain\Validation;

use Exception;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Library\Database\Persistence\LibraryBookPersistence;
use Modules\Library\Domain\Model\Library;
use Modules\Library\Domain\Persistence\ILibraryBookPersistence;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LibraryValidation
{
    private BookPersistence $bookPersistence;

    public function __construct(BookPersistence $bookPersistence)
    {
        $this->bookPersistence = $bookPersistence;
    }

    public function checkExists(?Library $library): void
    {
        if (!$library) {
            throw new NotFoundHttpException("not found!");
        }
    }


    /**
     * @throws Exception
     */
    public function checkUniqueBookInLibrary(int $bookId): void
    {
        if($this->bookPersistence->getLibraryById($bookId)){
            throw new Exception('This book exists in another library!');
        }
    }
}
