<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\AgeRangeInterface;
use CultuurNet\TransformEntryStore\ValueObjects\AgeRange\AgeRange;
use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

class StoreAgeRangeDBALRepository extends AbstractDBALRepository implements AgeRangeInterface
{
    /**
     * @inheritdoc
     */
    public function getAgeRange(
        StringLiteral $externalId
    ) {
        $whereId =  SchemaAgeRangeConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaAgeRangeConfigurator::AGE_FROM_COLUMN, SchemaAgeRangeConfigurator::AGE_TO_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();
        if (empty($resultSet)) {
            return null;
        } else {
            return UUID::fromNative($resultSet[0]);
        }
    }
    
    /**
     * @inheritdoc
     */
    public function saveAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaAgeRangeConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaAgeRangeConfigurator::AGE_FROM_COLUMN => '?',
                SchemaAgeRangeConfigurator::AGE_TO_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $ageRange->getAgeFrom(),
                $ageRange->getAgeTo()
            ]);

        $queryBuilder->execute();
    }
    
    /**
     * @inheritdoc
     */
    public function updateAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    ) {
        $whereId = SchemaAgeRangeConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaAgeRangeConfigurator::AGE_FROM_COLUMN,
                ':ageFrom'
            )
            ->set(
                SchemaAgeRangeConfigurator::AGE_TO_COLUMN,
                ':ageTo'
            )
            ->where($whereId)
            ->setParameters([
                SchemaAgeRangeConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaAgeRangeConfigurator::AGE_FROM_COLUMN => $ageRange->getAgeFrom()->toNative(),
                SchemaAgeRangeConfigurator::AGE_TO_COLUMN => $ageRange->getAgeTo()->toNative()
            ]);

        $queryBuilder->execute();
    }
}
