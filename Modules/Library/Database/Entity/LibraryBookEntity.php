<?php

namespace Modules\Library\Database\Entity;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Book\Database\Entity\BookEntity;

/**
 * @mixin Builder
 */
class LibraryBookEntity extends Model
{
    /******************** constants ********************/
    const TABLE_NAME = 'libraries_books';
    const ID = 'id';
    const BOOK_ID = 'book_id';
    const LIBRARY_ID = 'library_id';

    /******************** table and its fields ********************/
    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::ID,
        self::BOOK_ID,
        self::LIBRARY_ID,
    ];

    protected $casts = [];

    /********************* relations ********************/
    public function book(): belongsTo
    {
        return $this->belongsTo(BookEntity::class, self::BOOK_ID, BookEntity::ID);
    }

    public function getBook(): belongsTo
    {
        return $this->book()->first();
    }

    public function library(): belongsTo
    {
        return $this->belongsTo(BookEntity::class, self::BOOK_ID, BookEntity::ID);
    }

    public function getLibrary(): belongsTo
    {
        return $this->book()->first();
    }

    /******************** setters ********************/

    public function setId(int $id): void
    {
        $this->setAttribute(self::ID, $id);
    }

    public function setBookId(int $bookId): void
    {
        $this->setAttribute(self::BOOK_ID, $bookId);
    }

    public function setLibraryId(int $libraryId): void
    {
        $this->setAttribute(self::LIBRARY_ID, $libraryId);
    }

    /******************** getters ********************/

    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    public function getBookId(): int
    {
        return $this->getAttribute(self::BOOK_ID);
    }

    public function getLibraryId(): int
    {
        return $this->getAttribute(self::LIBRARY_ID);
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
