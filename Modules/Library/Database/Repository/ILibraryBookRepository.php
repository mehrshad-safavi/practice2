<?php

namespace Modules\Library\Database\Repository;

use Modules\Library\Database\Entity\LibraryBookEntity;
use Modules\Library\Domain\Model\LibraryBook;

interface ILibraryBookRepository
{
    public function store(LibraryBookEntity $libraryBookEntity): LibraryBookEntity;

    public function findByID(int $id): LibraryBookEntity;

    public function fidByTitle(string $title): LibraryBookEntity;

    /** LibraryEntity[] */
    public function fidAll(): array;
}
