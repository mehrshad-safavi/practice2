<?php

namespace Modules\Library\Database\Persistence;

use Modules\Library\Database\Mapper\LibraryBookMapper;
use Modules\Library\Database\Repository\ILibraryBookRepository;
use Modules\Library\Database\Repository\LibraryBookRepository;
use Modules\Library\Domain\Model\LibraryBook;
use Modules\Library\Domain\Persistence\ILibraryBookPersistence;

class LibraryBookPersistence implements ILibraryBookPersistence
{
    private ILibraryBooKRepository $libraryBookRepository;

    public function __construct(LibraryBookRepository $libraryBookRepository)
    {
        $this->libraryBookRepository = $libraryBookRepository;
    }

    public function store(LibraryBook $libraryBook): LibraryBook
    {
        $libraryBookEntity = LibraryBookMapper::mapModelToEntity($libraryBook);
        $this->libraryBookRepository->store($libraryBookEntity);
        return $libraryBook;
    }

    public function findById(int $id): ?LibraryBook
    {
//        $libraryEntity = $this->libraryBookRepository->findByID($id);
//        return LibraryBookMapper::mapEntityToModel($libraryEntity);
    }

    public function findByTitle(string $title): ?LibraryBook
    {
        // TODO: Implement findByTitle() method.
    }

    /** Library[] */
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }
}
