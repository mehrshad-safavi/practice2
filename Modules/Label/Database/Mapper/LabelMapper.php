<?php

namespace Modules\Label\Database\Mapper;

use Modules\Label\Database\Entity\LabelEntity;
use Modules\Label\Domain\Factory\LabelFactory;
use Modules\Label\Domain\Model\Label;

class LabelMapper
{
    public static function mapModelToEntity(Label $label): LabelEntity
    {
        $labelEntity = new LabelEntity();
        if ($label->getId()) {
            $labelEntity->setId($label->getId());
        }
        $labelEntity->setTitle($label->getTitle());
        $labelEntity->setColor($label->getColor());
        $labelEntity->setStatus($label->getStatus()->value);

        return $labelEntity;
    }

    public static function mapEntityToModel(LabelEntity $entity): Label
    {
        return LabelFactory::makeModel(
            $entity->getId(),
            $entity->getTitle(),
            $entity->getColor(),
            $entity->getStatus(),
            $entity->getCreatedAt(),
            $entity->getUpdatedAt(),
        );
    }

    /**
     * @param LabelEntity[] $labelEntities
     * @return Label[]
     */
    public static function mapEntitiesToModels(array $labelEntities): array
    {
        $labels = [];
        foreach ($labelEntities as $labelEntity) {
            $labels[] = self::mapEntityToModel($labelEntity);
        }

        return $labels;
    }
}
