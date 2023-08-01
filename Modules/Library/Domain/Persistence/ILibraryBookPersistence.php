<?php

namespace Modules\Library\Domain\Persistence;

use Modules\Library\Domain\Model\LibraryBook;

interface ILibraryBookPersistence
{
    public function store(LibraryBook $libraryBook): LibraryBook;

    public function findByBookAndLibrary(int $bookId, int $libraryId): ?LibraryBook;

    public function deleteById(int $id): void;
}
