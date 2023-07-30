<?php

namespace Modules\Library\Domain\Factory;

use DateTime;
use Modules\Library\Database\Entity\LibraryEntity;
use Modules\Library\Domain\Model\Library;

class LibraryFactory
{
    public static function makeModel(int $id, string $title, DateTime $createdAt, DateTime $updatedAt): Library
    {
        $library = new Library();
        $library->setId($id);
        $library->setTitle($title);
        $library->setCreatedAt($createdAt);
        $library->setUpdatedAt($updatedAt);

        return $library;
    }



}
