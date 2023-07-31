<?php

namespace Modules\Library\Http\ViewModel;

/**
 * @OA\Schema()
 */
class AddBookViewModel
{
    /**
     * @OA\Property
     * @var int
     */
    public int $bookId;

    /**
     * @OA\Property
     * @var int
     */
    public int $libraryId;

    public function __construct(int $bookId, int $libraryId)
    {
        $this->bookId = $bookId;
        $this->libraryId = $libraryId;

    }
}
