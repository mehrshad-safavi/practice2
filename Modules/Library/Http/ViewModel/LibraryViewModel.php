<?php

namespace Modules\Library\Http\ViewModel;

use Modules\Book\Domain\Model\Book;

/**
 * @OA\Schema()
 */
class LibraryViewModel
{
    /**
     * @OA\Property
     * @var Book[]
     */
    public array $books;

    /**
     * @OA\Property
     * @var int
     */
    public int $id;

    /**
     * @OA\Property
     * @var string
     */
    public string $title;

    public function __construct(int $id, string $title, array $books)
    {
        $this->id = $id;
        $this->title = $title;
        $this->books = $books;
    }
}
