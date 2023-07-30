<?php

namespace Modules\Library\Domain\Persistence;

use Modules\Library\Domain\Model\Library;

interface ILibraryPersistence
{
    public function store(Library $library): Library;

    public function findById(int $id): ?Library;

    public function findByTitle(string $title): ?Library;

    /** Library[] */
    public function findAll(): array;
}
