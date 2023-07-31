<?php

namespace Modules\Library\Domain\Factory;

use DateTime;
use Illuminate\Support\Facades\App;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Factory\BookFactory;
use Modules\Book\Domain\Model\Book;
use Modules\Library\Database\Entity\LibraryEntity;
use Modules\Library\Database\Persistence\LibraryPersistence;
use Modules\Library\Domain\Model\Library;
use Modules\Library\Domain\Model\LibraryBook;

class LibraryBookFactory
{
    public static function makeModel(int $id, Book $book, Library $library, DateTime $createdAt, DateTime $updatedAt): LibraryBook
    {
        $libraryBook = new LibraryBook();
        $libraryBook->setId($id);
        $libraryBook->setBook($book);
        $libraryBook->setLibrary($library);
        $libraryBook->setCreatedAt($createdAt);
        $libraryBook->setUpdatedAt($updatedAt);

        return $libraryBook;
    }

    public static function makeNewModel(Book $book, Library $library): LibraryBook
    {
        $libraryBook = new LibraryBook();
        $libraryBook->setId(null);
        $libraryBook->setBook($book);
        $libraryBook->setLibrary($library);

        return $libraryBook;
    }



}
