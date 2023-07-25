<?php

namespace Modules\Label\Database\Repository;

use Modules\Label\Database\Entity\LabelEntity;

interface ILabelRepository
{
    public function store(LabelEntity $labelEntity): LabelEntity;

    public function findById(int $id): ?LabelEntity;

    public function findByTitle(string $title): ?LabelEntity;

    /** @return LabelEntity[] */
    public function findAll(): array;
}
