<?php

namespace Modules\Label\Domain\Persistence;

use Modules\Label\Domain\Model\Label;

interface ILabelPersistence
{
    public function store(Label $label): Label;

    public function findById(int $id): ?Label;

    public function findByTitle(string $title): ?Label;

    /** @return Label[] */
    public function findAll(): array;

}
