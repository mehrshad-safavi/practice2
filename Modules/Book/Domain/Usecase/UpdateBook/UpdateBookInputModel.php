<?php

namespace Modules\Book\Domain\Usecase\UpdateBook;

class UpdateBookInputModel
{
    public int $id;
    public string $title;
    public string $publisher;
    public int $labelId;

    public function __construct(int $id, string $title, string $publisher, int $labelId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->labelId = $labelId;
    }
}
