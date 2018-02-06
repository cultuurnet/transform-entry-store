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
        $whereId = SchemaLocationConfigurator::EXTERNAL_ID_COLUMN . ' = :external_id';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaLocationConfigurator::LOCATION_CDBID_COLUMN,
                ':location_id'
            )
            ->where($whereId)
            ->setParameters([
                SchemaLocationConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaLocationConfigurator::LOCATION_CDBID_COLUMN => $locationCdbid->toNative()
            ]);

        $queryBuilder->execute();
    }
}
