<?php

namespace Modules\Library\Domain\Usecase\addBook;

use Exception;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Book\Domain\Validation\BookValidation;
use Modules\Library\Database\Persistence\LibraryBookPersistence;
use Modules\Library\Database\Persistence\LibraryPersistence;
use Modules\Library\Domain\Factory\LibraryBookFactory;
use Modules\Library\Domain\Persistence\ILibraryBookPersistence;
use Modules\Library\Domain\Persistence\ILibraryPersistence;
use Modules\Library\Domain\Validation\LibraryValidation;

class AddBookToLibraryUsecase
{
    private ILibraryBookPersistence $libraryBookPersistence;
    private ILibraryPersistence $libraryPersistence;
    private IBookPersistence $bookPersistence;
    private BookValidation $bookValidation;
    private LibraryValidation $libraryValidation;

    public function __construct(LibraryBookPersistence $libraryBookPersistence,
                                LibraryPersistence     $libraryPersistence,
                                BookPersistence        $bookPersistence,
                                LibraryValidation      $libraryValidation,
                                BookValidation         $bookValidation)
    {
        $this->libraryBookPersistence = $libraryBookPersistence;
        $this->libraryPersistence = $libraryPersistence;
        $this->bookPersistence = $bookPersistence;
        $this->libraryValidation = $libraryValidation;
        $this->bookValidation = $bookValidation;
    }


    /**
     * @throws Exception
     */
    public function execute(LibraryBookInputModel $libraryBookInputModel): LibraryBookOutputModel
    {
        $book = $this->bookPersistence->findById($libraryBookInputModel->bookId);
        $this->bookValidation->checkExists($book);
        $this->libraryValidation->checkInuseBooK($book->getId());

        $library = $this->libraryPersistence->findById($libraryBookInputModel->libraryId);
        $this->libraryValidation->checkExists($library);

        $libraryBook = LibraryBookFactory::makeNewModel($book, $library);

        $libraryBook = $this->libraryBookPersistence->store($libraryBook);

        return new LibraryBookOutputModel($libraryBook);
    }
}
