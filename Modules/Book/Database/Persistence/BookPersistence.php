<?php

namespace Modules\Book\Database\Persistence;

use Illuminate\Database\Eloquent\Model;
use Modules\Book\Database\Mapper\BookMapper;
use Modules\Book\Database\Repository\BookRepository;
use Modules\Book\Database\Repository\IBookRepository;
use Modules\Book\Domain\Model\Book;
use Modules\Book\Domain\Persistence\IBookPersistence;
use Modules\Label\Database\Entity\LabelEntity;

class BookPersistence implements IBookPersistence
{
    private IBookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function store(Book $book): Book
    {
        $bookEntity = BookMapper::mapModelToEntity($book);
        $bookEntity = $this->bookRepository->store($bookEntity);
        return BookMapper::mapEntityToModel($bookEntity);
    }

    public function findById(int $id): ?Book
    {
        $bookEntity = $this->bookRepository->findById($id);
        return $bookEntity ? BookMapper::mapEntityToModel($bookEntity) : null;
    }

    public function findByTitle(string $title): ?Book
    {
        $bookEntity = $this->bookRepository->findByTitle($title);
        return $bookEntity ? BookMapper::mapEntityToModel($bookEntity) : null;
    }

    public function findByTitleAndPublisher(string $title, string $publisher): ?Book
    {
        $bookEntity = $this->bookRepository->findByTitleAndPublisher($title, $publisher);
        return $bookEntity ? BookMapper::mapEntityToModel($bookEntity) : null;
    }

    public function findByPublisher(string $publisher): ?Book
    {
        $bookEntity = $this->bookRepository->findByTitle($publisher);
        return $bookEntity ? BookMapper::mapEntityToModel($bookEntity) : null;
    }

    /** @return Book[] */
    public function findAll(): array
    {
        $bookEntities = $this->bookRepository->findAll();
        return BookMapper::mapEntitiesToModels($bookEntities);
    }

    public function deleteById(int $id): void
    {
        $bookEntity = $this->bookRepository->findById($id);
        $bookEntity->delete();
    }

    public function getLibraryById(int $id): Model|null|LabelEntity
    {
        $bookEntity = $this->bookRepository->findById($id);
        return $bookEntity->getLibrary();
    }
}
