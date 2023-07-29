<?php

namespace Modules\Book\Http\ViewModel;

/**
 * @OA\Schema(required={"title"})
 */
class BookViewModel
{
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

    /**
     * @OA\Property
     * @var string
     */
    public string $publisher;

    /**
     * @OA\Property
     * @var int
     */
    public int $labelId;

    public function __construct(int $id, string $title, string $publisher, int $labelId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->labelId = $labelId;
    }
}
