<?php

namespace Modules\Label\Domain\Model;

enum LabelStatusEnum: string
{
    case ACTIVE = "active";
    case INACTIVE = "inactive";
}
