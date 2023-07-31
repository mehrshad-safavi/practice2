<?php

namespace Modules\Library\Database\Repository;

use Modules\Library\Database\Entity\LibraryEntity;

interface ILibraryRepository
{
    public function store(string $title): LibraryEntity;

    public function findByID(int $id): ?LibraryEntity;

    public function fidByTitle(string $title): ?LibraryEntity;

    /** LibraryEntity[] */
    public function fidAll(): array;
}
