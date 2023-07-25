<?php

namespace Modules\Label\Database\Persistence;

use Modules\Label\Database\Mapper\LabelMapper;
use Modules\Label\Database\Repository\ILabelRepository;
use Modules\Label\Database\Repository\LabelRepository;
use Modules\Label\Domain\Model\Label;
use Modules\Label\Domain\Persistence\ILabelPersistence;

class LabelPersistence implements ILabelPersistence
{
    private ILabelRepository $labelRepository;

    public function __construct(LabelRepository $labelRepository)
    {
        $this->labelRepository = $labelRepository;
    }

    public function store(Label $label): Label
    {
        $labelEntity = LabelMapper::mapModelToEntity($label);
        $labelEntity = $this->labelRepository->store($labelEntity);
        return LabelMapper::mapEntityToModel($labelEntity);
    }

    public function findById(int $id): ?Label
    {
        $labelEntity = $this->labelRepository->findById($id);
        return $labelEntity ? LabelMapper::mapEntityToModel($labelEntity) : null;
    }

    public function findByTitle(string $title): ?Label
    {
        $labelEntity = $this->labelRepository->findByTitle($title);
        return $labelEntity ? LabelMapper::mapEntityToModel($labelEntity) : null;
    }

    /** @return Label[] */
    public function findAll(): array
    {
        $labelEntities = $this->labelRepository->findAll();
        return LabelMapper::mapEntitiesToModels($labelEntities);
    }

}
