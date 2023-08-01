<?php

namespace Modules\Library\Database\Entity;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Modules\Book\Database\Entity\BookEntity;
use Modules\Label\Database\Entity\LabelEntity;

/**
 * @mixin Builder
 */
class LibraryEntity extends Model
{
    /******************** constants ********************/
    const ID = 'id';
    const TITLE = 'name';

    /******************** table and its fields ********************/
    protected $table = 'libraries';
    protected $fillable = [
        self::ID,
        self::TITLE,
    ];

    protected $casts = [];

    /********************* relations ******************/

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(BookEntity::class,
            LibraryBookEntity::TABLE_NAME,
            LibraryBookEntity::BOOK_ID, BookEntity::ID);
    }

    /** BookEntity[] */
    public function getBooks(): null|array
    {
        return $this->books()->getModels();
    }

    /******************** setters ********************/

    public function setId(int $id): void
    {
        $this->setAttribute(self::ID, $id);
    }

    public function setTitle(string $title): void
    {
        $this->setAttribute(self::TITLE, $title);
    }

    /******************** getters ********************/

    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    public function getTitle(): string
    {
        return $this->getAttribute(self::TITLE);
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
