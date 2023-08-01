<?php

namespace Modules\Library\Domain\Usecase\removeBook;

use Exception;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Book\Domain\Validation\BookValidation;
use Modules\Library\Database\Persistence\LibraryBookPersistence;
use Modules\Library\Database\Persistence\LibraryPersistence;
use Modules\Library\Domain\Persistence\ILibraryBookPersistence;
use Modules\Library\Domain\Persistence\ILibraryPersistence;
use Modules\Library\Domain\Validation\LibraryValidation;

class RemoveBookUsecase implements IRemoveBookUsecase
{
    private ILibraryBookPersistence $libraryBookPersistence;
    private ILibraryPersistence $libraryPersistence;
    private IBookPersistence $bookPersistence;
    private BookValidation $bookValidation;
    private LibraryValidation $libraryValidation;

    public function __construct(LibraryBookPersistence $libraryBookPersistence,
                                LibraryPersistence     $libraryPersistence,
                                BookPersistence        $BookPersistence,
                                LibraryValidation      $libraryValidation,
                                BookValidation         $bookValidation)
    {
        $this->libraryBookPersistence = $libraryBookPersistence;
        $this->libraryPersistence = $libraryPersistence;
        $this->bookPersistence = $BookPersistence;
        $this->libraryValidation = $libraryValidation;
        $this->bookValidation = $bookValidation;
    }

    /**
     * @throws Exception
     */
    public function execute(RemoveBookInputModel $removeBookInputModel): void
    {
        $book = $this->bookPersistence->findById($removeBookInputModel->bookId);
        $this->bookValidation->checkExists($book);

        $library = $this->libraryPersistence->findById($removeBookInputModel->libraryId);
        $this->libraryValidation->checkExists($library);

        $libraryBook = $this->libraryBookPersistence->findByBookAndLibrary(
            $removeBookInputModel->bookId, $removeBookInputModel->libraryId);
        $this->libraryValidation->checkExistsBookInLibrary($libraryBook);

        $this->libraryBookPersistence->deleteById($libraryBook->getId());
    }
}
