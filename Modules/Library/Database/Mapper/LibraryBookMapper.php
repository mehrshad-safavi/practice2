<?php

namespace Modules\Library\Database\Mapper;

use Modules\Library\Database\Entity\LibraryBookEntity;
use Modules\Library\Domain\Model\Library;
use Modules\Library\Domain\Model\LibraryBook;

class LibraryBookMapper
{

    public static function mapModelToEntity(LibraryBook $libraryBook): LibraryBookEntity
    {
        $libraryEntity = new LibraryBookEntity();
        if ($libraryBook->getId()){
            $libraryEntity->setId($libraryBook->getId());
        }
        $libraryEntity->setBookId($libraryBook->getBook()->getId());
        $libraryEntity->setLibraryId($libraryBook->getLibrary()->getId());
        return $libraryEntity;
    }

    public static function mapEntityToModel(LibraryBookEntity $libraryEntity): Library
    {
        $library = new Library();
        $library->setId($libraryEntity->getId());
        $library->setTitle($libraryEntity->getTitle());
        $library->setCreatedAt($libraryEntity->getCreatedAt());
        $library->setUpdatedAt($libraryEntity->getUpdatedAt());

        return $library;
    }

}
