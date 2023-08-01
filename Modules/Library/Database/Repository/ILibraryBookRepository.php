<?php

namespace Modules\Library\Database\Repository;

use Modules\Library\Database\Entity\LibraryBookEntity;

interface ILibraryBookRepository
{
    public function store(LibraryBookEntity $libraryBookEntity): LibraryBookEntity;

    public function findByBookAndLibrary(int $bookId, int $libraryId): ?LibraryBookEntity;

    public function findById(int $id): LibraryBookEntity;
}
