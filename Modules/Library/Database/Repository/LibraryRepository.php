<?php

namespace Modules\Library\Database\Repository;

use Modules\Label\Database\Entity\LabelEntity;
use Modules\Library\Database\Entity\LibraryEntity;

class LibraryRepository implements ILibraryRepository
{

    public function store(string $title): LibraryEntity
    {
        // TODO: Implement store() method.
    }

    public function findByID(int $id): ?LibraryEntity
    {
        return LibraryEntity::where(LibraryEntity::ID, $id)->first();
    }

    public function fidByTitle(string $title): ?LibraryEntity
    {
        // TODO: Implement fidByTitle() method.
    }

    /** @return LabelEntity[] */
    public function fidAll(): array
    {
        // TODO: Implement fidAll() method.
    }
}
