<?php

namespace Modules\Book\Http\ViewModel;

use Modules\Label\Http\ViewModel\LabelViewModel;

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
     * @var LabelViewModel
     */
    public LabelViewModel $label;

    public function __construct(int $id, string $title, string $publisher, LabelViewModel $label)
    {
        $this->id = $id;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->label = $label;
    }
}
