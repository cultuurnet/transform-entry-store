<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\EventProductionInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreEventProductionDBALRepository extends AbstractDBALRepository implements EventProductionInterface
{
    /**
     * @inheritdoc
     */
    public function getCdbids(StringLiteral $externalId)
    {
        $whereId = SchemaEventProductionConfigurator::EXTERNAL_ID_PRODUCTION_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaEventProductionConfigurator::CDBID_EVENT_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return $resultSet;
        }
    }

    /**
     * @inheritdoc
     */
    public function saveEventProduction(
        StringLiteral $externalIdEvent,
        StringLiteral $externalIdProduction,
        UUID $cdbid
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([

                SchemaEventProductionConfigurator::EXTERNAL_ID_EVENT_COLUMN => '?',
                SchemaEventProductionConfigurator::EXTERNAL_ID_PRODUCTION_COLUMN => '?',
                SchemaEventProductionConfigurator::CDBID_EVENT_COLUMN => '?'
            ])
            ->setParameters([
                $externalIdEvent,
                $externalIdProduction,
                $cdbid
            ]);

        $queryBuilder->execute();
    }
}
