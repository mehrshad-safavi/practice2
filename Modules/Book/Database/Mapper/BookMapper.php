<?php

namespace Modules\Book\Database\Mapper;

use Modules\Book\Database\Entity\BookEntity;
use Modules\Book\Domain\Factory\BookFactory;
use Modules\Book\Domain\Model\Book;
use Modules\Label\Database\Mapper\LabelMapper;

class BookMapper
{
    public static function mapModelToEntity(Book $book): BookEntity
    {
        $bookEntity = new BookEntity();
        if ($book->getId()) {
            $bookEntity->setId($book->getId());
        }
        $bookEntity->setTitle($book->getTitle());
        $bookEntity->setPublisher($book->getPublisher());
        $bookEntity->setLabelId($book->getLabel()->getId());

        return $bookEntity;
    }

    public static function mapEntityToModel(BookEntity $entity): Book
    {
        return BookFactory::makeModel(
            $entity->getId(),
            $entity->getTitle(),
            $entity->getPublisher(),
            LabelMapper::mapEntityToModel($entity->getLabel()),
            $entity->getCreatedAt(),
            $entity->getUpdatedAt(),
        );
    }

    /**
     * @param BookEntity[] $labelEntities
     * @return Book[]
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
