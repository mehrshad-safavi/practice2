<?php

namespace Modules\Book\Domain\Validation;

use App\Validations\InputDataValidation;
use Illuminate\Validation\ValidationException;
use Modules\Book\Domain\Model\Book;
use Modules\Book\Domain\Rule\UniqueBookRule;
use Modules\Label\Domain\Rule\UniqueLabelTitleRule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookValidation
{
    private UniqueBookRule $uniqueBookRule;

    public function __construct(UniqueBookRule $uniqueBookRule)
    {
        $this->uniqueBookRule = $uniqueBookRule;
    }

    public function checkExists(?Book $book): void
    {
        if (!$book) {
            throw new NotFoundHttpException("not found!");
        }
    }

    /**
     * @throws ValidationException
     */
    public function checkUniqueBook(string $title, string $publisher, ?int $id = null): void
    {
        $this->uniqueBookRule->setId($id);
        $this->uniqueBookRule->setPublisher($publisher);
        InputDataValidation::validate('title', $title, [$this->uniqueBookRule]);
    }
}
