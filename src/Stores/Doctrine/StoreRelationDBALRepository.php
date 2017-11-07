<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\RelationInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreRelationDBALRepository extends AbstractDBALRepository implements RelationInterface
{
    /**
     * @inheritdoc
     */
    public function getCdbid(StringLiteral $externalId)
    {
        $whereId = SchemaRelationConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

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
            return StringLiteral::fromNative($resultSet[0]['cdbid']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveCdbid(StringLiteral $externalId, UUID $cdbid)
    {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaRelationConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaRelationConfigurator::CDBID_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $cdbid
            ]);

        $queryBuilder->execute();
    }
}
