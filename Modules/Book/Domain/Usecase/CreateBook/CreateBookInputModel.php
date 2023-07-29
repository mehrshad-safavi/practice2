<?php

namespace Modules\Book\Domain\Usecase\CreateBook;

class CreateBookInputModel
{
    public string $title;
    public string $publisher;
    public int $labelId;

    public function __construct(string $title, string $publisher, int $labelId)
    {
        $this->title = $title;
        $this->publisher = $publisher;
        $this->labelId = $labelId;
    }
}
