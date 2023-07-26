<?php

namespace Modules\Label\Domain\Usecase\UpdateLabel;

class UpdateLabelInputModel
{
    public int $id;
    public string $title;
    public ?string $color;

    public function __construct(int $id, string $title, ?string $color)
    {
        $this->id = $id;
        $this->title = $title;
        $this->color = $color;
    }
}
