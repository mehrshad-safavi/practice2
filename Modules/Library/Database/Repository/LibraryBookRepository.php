<?php

namespace Modules\Library\Database\Repository;

use Modules\Library\Database\Entity\LibraryBookEntity;

class LibraryBookRepository implements ILibraryBookRepository
{
    public function store(LibraryBookEntity $libraryBookEntity): LibraryBookEntity
    {
        return (new LibraryBookEntity())
            ->updateOrCreate([LibraryBookEntity::ID => $libraryBookEntity->getId(), $libraryBookEntity->getAttributes()]);
    }

    public function findByBookAndLibrary(int $bookId, int $libraryId): ?LibraryBookEntity
    {
        return (new LibraryBookEntity)
            ->where(LibraryBookEntity::LIBRARY_ID, $libraryId)
            ->where(LibraryBookEntity::BOOK_ID, $bookId)->first();
    }

    public function findById(int $id): LibraryBookEntity
    {
        return (new LibraryBookEntity)
            ->where(LibraryBookEntity::ID, $id)->first();
    }
}
