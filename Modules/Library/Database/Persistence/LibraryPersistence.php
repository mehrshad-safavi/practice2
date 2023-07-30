<?php

namespace Modules\Library\Database\Persistence;

use Modules\Library\Database\Mapper\LibraryMapper;
use Modules\Library\Database\Repository\ILibraryRepository;
use Modules\Library\Domain\Model\Library;
use Modules\Library\Domain\Persistence\ILibraryPersistence;

class LibraryPersistence implements ILibraryPersistence
{
    private ILibraryRepository $libraryRepository;

    public function __construct(ILibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
    }

    public function store(Library $library): Library
    {

    }

    public function findById(int $id): ?Library
    {
        $libraryEntity = $this->libraryRepository->findByID($id);
        return LibraryMapper::mapEntityToModel($libraryEntity);
    }

    public function findByTitle(string $title): ?Library
    {
        // TODO: Implement findByTitle() method.
    }

    /** Library[] */
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }
}
