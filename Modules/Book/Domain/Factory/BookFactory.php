<?php

namespace Modules\Book\Domain\Factory;

use DateTime;
use Modules\Book\Domain\Model\Book;
use Modules\Label\Domain\Model\Label;

class BookFactory
{
    public static function makeNewModel(string $title, string $publisher, Label $label): Book
    {
        $book = new Book();
        $book->setId(null);
        $book->setTitle($title);
        $book->setPublisher($publisher);
        $book->setLabel($label);

        return $book;
    }

    public static function makeModel(int   $id, string $title, string $publisher,
                                     Label $label, DateTime $created_at, DateTime $updated_at): Book
    {
        $book = new Book();
        $book->setId($id);
        $book->setTitle($title);
        $book->setPublisher($publisher);
        $book->setLabel($label);
        $book->setCreatedAt($created_at);
        $book->setUpdatedAt($updated_at);

        return $book;
    }

    public static function updateModel(Book $book, string $title, string $publisher, Label $label): Book
    {
        $book->setTitle($title);
        $book->setPublisher($publisher);
        $book->setLabel($label);

        return $book;
    }
}
