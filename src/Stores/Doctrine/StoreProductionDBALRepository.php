<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\ProductionInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreProductionDBALRepository extends AbstractDBALRepository implements ProductionInterface
{
    /**
     * @inheritdoc
     */
    public function getProductionCdbid(StringLiteral $externalId)
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
            $cdbid = $resultSet[0]['cdbid'];
            $cdbidUuid = UUID::fromNative($cdbid);
            return $cdbidUuid;
        }
    }

    /**
     * @inheritdoc
     */
    public function saveProductionCdbid(StringLiteral $externalId, UUID $cdbid)
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
