<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\LocationInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreLocationDBALRepository extends AbstractDBALRepository implements LocationInterface
{
    /**
     * @inheritdoc
     */
    public function getLocationCdbid(StringLiteral $externalId)
    {
        $whereId = SchemaLocationConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaLocationConfigurator::LOCATION_CDBID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['location_id']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveLocationCdbid(StringLiteral $externalId, UUID $locationCdbid)
    {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([

                SchemaLocationConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaLocationConfigurator::LOCATION_CDBID_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $locationCdbid
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateLocationCdbid(StringLiteral $externalId, UUID $locationCdbid)
    {
        // TODO: Implement updateLocationCdbid() method.
    }
}
