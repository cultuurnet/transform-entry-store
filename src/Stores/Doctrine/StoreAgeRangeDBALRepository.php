<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\AgeRangeInterface;
use CultuurNet\TransformEntryStore\ValueObjects\AgeRange\AgeRange;
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
        $queryBuilder->select(SchemaRelationConfigurator::CDBID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();
        if (empty($resultSet)) {
            return null;
        } else {
            return UUID::fromNative($resultSet[0]['cdbid']);
        }
    }
    
    /**
     * @inheritdoc
     */
    public function saveAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    ) {
        // TODO: Implement saveAgeRange() method.
    }
    
    /**
     * @inheritdoc
     */
    public function updateAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    ) {
        // TODO: Implement updateAgeRange() method.
    }
}
