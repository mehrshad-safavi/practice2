<?php

namespace Modules\Library\Database\Mapper;

use Modules\Library\Database\Entity\LibraryEntity;
use Modules\Library\Domain\Model\Library;

class LibraryMapper
{

    public static function mapModelToEntity(Library $library): LibraryEntity
    {
        $libraryEntity = new LibraryEntity();
        if ($library->getId()){
            $libraryEntity->setId($library->getId());
        }
        $libraryEntity->setTitle($library->getTitle());
        return $libraryEntity;
    }

    public static function mapEntityToModel(LibraryEntity $libraryEntity): Library
    {
        $library = new Library();
        $library->setId($libraryEntity->getId());
        $library->setTitle($libraryEntity->getTitle());
        $library->setCreatedAt($libraryEntity->getCreatedAt());
        $library->setUpdatedAt($libraryEntity->getUpdatedAt());

        return $library;
    }

}
