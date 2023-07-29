<?php

namespace Modules\Book\Http\DTO;

/**
 * @OA\Schema(required={"title"})
 */
class BookDTO
{
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

    public function __construct(string $title, ?string $publisher, int $labelId)
    {
        $this->title = $title;
        $this->publisher = $publisher;
        $this->labelId = $labelId;
    }
}
