<?php

namespace Modules\Book\Domain\Usecase\CreateBook;

use Modules\Book\Domain\Model\Book;

class CreateBookOutputModel
{
    public Book $label;

    public function __construct(Book $label)
    {
        $this->label = $label;
    }
}
