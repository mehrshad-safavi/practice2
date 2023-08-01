<?php

namespace Modules\Library\Database\Persistence;

use Modules\Library\Database\Mapper\LibraryBookMapper;
use Modules\Library\Database\Repository\ILibraryBookRepository;
use Modules\Library\Database\Repository\LibraryBookRepository;
use Modules\Library\Domain\Model\LibraryBook;
use Modules\Library\Domain\Persistence\ILibraryBookPersistence;

class LibraryBookPersistence implements ILibraryBookPersistence
{
    private ILibraryBooKRepository $libraryBookRepository;

    public function __construct(LibraryBookRepository $libraryBookRepository)
    {
        $this->libraryBookRepository = $libraryBookRepository;
    }

    public function store(LibraryBook $libraryBook): LibraryBook
    {
        $libraryBookEntity = LibraryBookMapper::mapModelToEntity($libraryBook);
        $this->libraryBookRepository->store($libraryBookEntity);

        return $libraryBook;
    }

    public function findByBookAndLibrary(int $bookId, int $libraryId): ?LibraryBook
    {
        $libraryEntity = $this->libraryBookRepository->findByBookAndLibrary($bookId, $libraryId);

        return $libraryEntity ? LibraryBookMapper::mapEntityToModel($libraryEntity) : null;
    }

    public function deleteById(int $id): void
    {
        $libraryEntity = $this->libraryBookRepository->findById($id);
        $libraryEntity->delete();
    }
}
