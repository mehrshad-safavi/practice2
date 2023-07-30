<?php

namespace Modules\Book\Database\Entity;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Label\Database\Entity\LabelEntity;

/**
 * @mixin Builder
 */
class BookEntity extends Model
{
    use SoftDeletes;

    /******************** constants ********************/
    const TABLE_NAME = 'books';

    const ID = 'id';
    const TITLE = 'title';
    const PUBLISHER = 'publisher';
    const LABEL_ID = 'label_id';
    const DELETED_AT = 'deleted_at';

    /******************** table and its fields ********************/
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::TITLE,
        self::PUBLISHER,
        self::LABEL_ID,
    ];

    protected $casts = [];

    /********************* relations ******************/

    public function label(): BelongsTo
    {
        return $this->belongsTo(LabelEntity::class, self::LABEL_ID, LabelEntity::ID);
    }

    public function getLabel(): Model|null|LabelEntity
    {
        return $this->label()->first();
    }

    /**************************** setters **************************/
    public function setId(int $id): void
    {
        $this->setAttribute(self::ID, $id);
    }

    public function setTitle(string $title): void
    {
        $this->setAttribute(self::TITLE, $title);
    }

    public function setPublisher(string $publisher): void
    {
        $this->setAttribute(self::PUBLISHER, $publisher);
    }

    public function setLabelId(int $labelId): void
    {
        $this->setAttribute(self::LABEL_ID, $labelId);
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

    public function getPublisher(): string
    {
        return $this->getAttribute(self::PUBLISHER);
    }

    public function getLabelId(): int
    {
        return $this->getAttribute(self::LABEL_ID);
    }

    public function getCreatedAt(): DateTime
    {
        return $this->getAttribute(self::CREATED_AT);
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->getAttribute(self::UPDATED_AT);
    }

    public function getDeletedAt(): DateTime
    {
        return $this->getAttribute(self::DELETED_AT);
    }
}
