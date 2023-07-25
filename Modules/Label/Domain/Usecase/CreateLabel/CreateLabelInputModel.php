<?php

namespace Modules\Label\Domain\Usecase\CreateLabel;

class CreateLabelInputModel
{
    public string $title;
    public ?string $color;

    public function __construct(string $title, ?string $color)
    {
        $this->title = $title;
        $this->color = $color;
    }
}
