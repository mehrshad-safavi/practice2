<?php

namespace Modules\Book\Domain\Service;

interface IBookService
{
    public function inuseBook(int $bookId): bool;
}
