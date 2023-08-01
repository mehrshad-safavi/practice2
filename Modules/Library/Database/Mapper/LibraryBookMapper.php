<?php

namespace Modules\Library\Database\Mapper;

use Modules\Book\Database\Mapper\BookMapper;
use Modules\Library\Database\Entity\LibraryBookEntity;
use Modules\Library\Domain\Model\LibraryBook;

class LibraryBookMapper
{

    public static function mapModelToEntity(LibraryBook $libraryBook): LibraryBookEntity
    {
        $libraryBookEntity = new LibraryBookEntity();
        if ($libraryBook->getId()){
            $libraryBookEntity->setId($libraryBook->getId());
        }
        $libraryBookEntity->setBookId($libraryBook->getBook()->getId());
        $libraryBookEntity->setLibraryId($libraryBook->getLibrary()->getId());

        return $libraryBookEntity;
    }

    public static function mapEntityToModel(LibraryBookEntity $libraryBookEntity): LibraryBook
    {
        $libraryBook = new LibraryBook();
        $libraryBook->setId($libraryBookEntity->getId());
        $libraryBook->setLibrary(LibraryMapper::mapEntityToModel($libraryBookEntity->getLibrary()));
        $libraryBook->setBook(BookMapper::mapEntityToModel($libraryBookEntity->getBook()));
        $libraryBook->setCreatedAt($libraryBookEntity->getCreatedAt());
        $libraryBook->setUpdatedAt($libraryBookEntity->getUpdatedAt());

        return $libraryBook;
    }

}
