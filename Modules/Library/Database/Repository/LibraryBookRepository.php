<?php

namespace Modules\Library\Database\Repository;

use Modules\Label\Database\Entity\LabelEntity;
use Modules\Library\Database\Entity\LibraryBookEntity;
use Modules\Library\Domain\Model\LibraryBook;

class LibraryBookRepository implements ILibraryBookRepository
{
    public function store(LibraryBookEntity $libraryBookEntity): LibraryBookEntity
    {
        return (new LibraryBookEntity())
            ->updateOrCreate([
            LibraryBookEntity::LIBRARY_ID => $libraryBookEntity->getLibraryId(),
            LibraryBookEntity::BOOK_ID => $libraryBookEntity->getBookId()]);
    }

    public function findByID(int $id): LibraryBookEntity
    {
        return LibraryBookEntity::where(LibraryBookEntity::ID, $id)->first();
    }

    public function fidByTitle(string $title): LibraryBookEntity
    {
        // TODO: Implement fidByTitle() method.
    }

    /** @return LabelEntity[] */
    public function fidAll(): array
    {
        // TODO: Implement fidAll() method.
    }
}
