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
    private IBookPersistence $BookPersistence;
    private BookValidation $bookValidation;
    private LibraryValidation $libraryValidation;

    public function __construct(LibraryBookPersistence $libraryBookPersistence,
                                LibraryPersistence $libraryPersistence, BookPersistence $BookPersistence,
                                LibraryValidation $libraryValidation)
    {
        $this->libraryBookPersistence = $libraryBookPersistence;
        $this->libraryPersistence = $libraryPersistence;
        $this->BookPersistence = $BookPersistence;
        $this->libraryValidation = $libraryValidation;
    }


    /**
     * @throws Exception
     */
    public function execute(LibraryBookInputModel $libraryBookInputModel): LibraryBookOutputModel
    {
        $book = $this->BookPersistence->findById($libraryBookInputModel->bookId);
        $library = $this->libraryPersistence->findById($libraryBookInputModel->libraryId);
        $libraryBook = LibraryBookFactory::makeNewModel($book, $library);

        $this->libraryValidation->checkUniqueBookInLibrary($book->getId());
        $libraryBook = $this->libraryBookPersistence->store($libraryBook);

        return new LibraryBookOutputModel($libraryBook);
    }
}
