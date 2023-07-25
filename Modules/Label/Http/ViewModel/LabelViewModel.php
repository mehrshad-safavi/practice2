<?php

namespace Modules\Label\Http\ViewModel;

/**
 * @OA\Schema(required={"title"})
 */
class LabelViewModel
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
     * @var ?string
     */
    public ?string $color;

    /**
     * @OA\Property
     * @var string
     */
    public string $status;

    public function __construct(int $id, string $title, ?string $color, string $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->color = $color;
        $this->status = $status;
    }
}
