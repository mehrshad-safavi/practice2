<?php

namespace Modules\Label\Database\Entity;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Label\Domain\Model\LabelStatusEnum;

/**
 * @mixin Builder
 */
class LabelEntity extends Model
{
    /******************** constants ********************/
    const TABLE_NAME = "labels";

    const ID = "id";
    const TITLE = "title";
    const COLOR = "color";
    const STATUS = "status";

    /******************** table and its fields ********************/
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::TITLE,
        self::COLOR,
        self::STATUS,
    ];

    protected $casts = [];

    /******************** setters ********************/
    public function setId(?int $id): void
    {
        $this->setAttribute(self::ID, $id);
    }

    public function setTitle(string $title): void
    {
        $this->setAttribute(self::TITLE, $title);
    }

    public function setColor(?string $color): void
    {
        $this->setAttribute(self::COLOR, $color);
    }

    public function setStatus(string $status): void
    {
        $this->setAttribute(self::STATUS, $status);
    }

    /******************** getters ********************/
    public function getId(): ?int
    {
        return $this->getAttribute(self::ID);
    }

    public function getTitle(): string
    {
        return $this->getAttribute(self::TITLE);
    }

    public function getColor(): ?string
    {
        return $this->getAttribute(self::COLOR);
    }

    public function getStatus(): string
    {
        return $this->getAttribute(self::STATUS);
    }

    public function getCreatedAt(): DateTime
    {
        return $this->getAttribute(self::CREATED_AT);
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->getAttribute(self::UPDATED_AT);
    }
}
