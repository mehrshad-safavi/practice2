<?php

namespace Modules\Book\Domain\Rule;

use Illuminate\Contracts\Validation\Rule;
use Modules\Book\Database\Persistence\BookPersistence;
use Modules\Book\Domain\Persistence\IBookPersistence;

class UniqueBookRule implements Rule
{
    private IBookPersistence $bookPersistence;
    private ?int $id = null;
    private string $publisher;

    public function __construct(BookPersistence $bookPersistence)
    {
        $this->bookPersistence = $bookPersistence;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function passes($attribute, $value): bool
    {
        $book = $this->bookPersistence->findByTitleAndPublisher($value, $this->publisher);
        return $this->id ?
            ($book == null || $book->getId() == $this->id)
            : $book == null;
    }

    public function message(): string
    {
        return __('validation.unique');
    }
}
