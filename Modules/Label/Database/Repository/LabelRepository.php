<?php

namespace Modules\Label\Database\Repository;

use Modules\Label\Database\Entity\LabelEntity;

class LabelRepository implements ILabelRepository
{
    public function store(LabelEntity $labelEntity): LabelEntity
    {
        return (new LabelEntity())
            ->updateOrCreate([LabelEntity::ID => $labelEntity->getId()], $labelEntity->getAttributes());
    }

    public function findById(int $id): ?LabelEntity
    {
        return (new LabelEntity())
            ->find($id);
    }

    public function findByTitle(string $title): ?LabelEntity
    {
        return (new LabelEntity())
            ->where(LabelEntity::TITLE, $title)
            ->first();
    }

    /** @return LabelEntity[] */
    public function findAll(): array
    {
        return (new LabelEntity())
            ->getModels();
    }
}
