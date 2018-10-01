<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\ImageInterface;
use CultuurNet\TransformEntryStore\ValueObjects\Language\LanguageCode;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreImageDBALRepository extends AbstractDBALRepository implements ImageInterface
{
    /**
     * @inheritdoc
     */
    public function getImageId($externalId)
    {
        $whereId = SchemaImageConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaImageConfigurator::IMAGE_ID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId->toNative());

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['image_id']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveImage(
        StringLiteral $externalId,
        UUID $imageId,
        StringLiteral $description,
        StringLiteral $copyright,
        LanguageCode $languageCode
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaImageConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaImageConfigurator::IMAGE_ID_COLUMN => '?',
                SchemaImageConfigurator::DESCRIPTION_COLUMN => '?',
                SchemaImageConfigurator::COPYRIGHT_COLUMN => '?',
                SchemaImageConfigurator::LANGUAGE_ID_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $imageId,
                $description,
                $copyright,
                $languageCode
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateImage(
        StringLiteral $externalId,
        UUID $imageId,
        StringLiteral $description,
        StringLiteral $copyright,
        LanguageCode $languageCode
    ) {
        $whereId = SchemaImageConfigurator::EXTERNAL_ID_COLUMN . ' = :external_id';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaImageConfigurator::IMAGE_ID_COLUMN,
                ':image_id'
            )
            ->set(
                SchemaImageConfigurator::DESCRIPTION_COLUMN,
                ':description'
            )
            ->set(
                SchemaImageConfigurator::COPYRIGHT_COLUMN,
                ':copyright'
            )
            ->set(
                SchemaImageConfigurator::LANGUAGE_ID_COLUMN,
                ':language_id'
            )
            ->where($whereId)
            ->setParameters([
                SchemaImageConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaImageConfigurator::IMAGE_ID_COLUMN =>$imageId->toNative(),
                SchemaImageConfigurator::DESCRIPTION_COLUMN => $description->toNative(),
                SchemaImageConfigurator::COPYRIGHT_COLUMN => $copyright->toNative(),
                SchemaImageConfigurator::LANGUAGE_ID_COLUMN => $languageCode->toNative()
            ]);

        $queryBuilder->execute();
    }
}
