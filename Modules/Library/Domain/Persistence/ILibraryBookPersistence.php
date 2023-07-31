<?php

namespace Modules\Library\Domain\Persistence;

use Modules\Library\Domain\Model\LibraryBook;

interface ILibraryBookPersistence
{
    public function store(LibraryBook $libraryBook): LibraryBook;

    public function findById(int $id): ?LibraryBook;

    public function findByTitle(string $title): ?LibraryBook;

    /** LibraryBook[] */
    public function findAll(): array;
}
