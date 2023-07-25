<?php

namespace Modules\Label\Http\DTO;

/**
 * @OA\Schema(required={"title"})
 */
class LabelDTO
{
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

    public function __construct(string $title, ?string $color)
    {
        $this->title = $title;
        $this->color = $color;
    }
}
