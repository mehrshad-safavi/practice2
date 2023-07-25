<?php

namespace Modules\Label\Domain\Factory;

use DateTime;
use Modules\Label\Domain\Model\Label;
use Modules\Label\Domain\Model\LabelStatusEnum;

class LabelFactory
{
    public static function makeNewModel(string $title, ?string $color): Label
    {
        $label = new Label();
        $label->setId(null);
        $label->setTitle($title);
        $label->setColor($color);
        $label->setStatus(LabelStatusEnum::ACTIVE);

        return $label;
    }

    public static function makeModel(int      $id, string $title, ?string $color, string $status,
                                     DateTime $createdAt, DateTime $updatedAt): Label
    {
        $label = new Label();
        $label->setId($id);
        $label->setTitle($title);
        $label->setColor($color);
        $label->setStatus(LabelStatusEnum::ACTIVE);

        return $label;
    }
}
