<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\OrganizerInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreOrganizerDBALRepository extends AbstractDBALRepository implements OrganizerInterface
{
    /**
     * @inheritdoc
     */
    public function getOrganizerCdbid(StringLiteral $externalId)
    {
        $whereId = SchemaOrganizerConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaOrganizerConfigurator::ORGANIZER_CDBID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['name']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveOrganizerCdbid(StringLiteral $externalId, UUID $organizerCdbid)
    {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([


                SchemaOrganizerConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaOrganizerConfigurator::ORGANIZER_CDBID_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $organizerCdbid
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateOrganizerCdbid(StringLiteral $externalId, UUID $organizerCdbid)
    {
        $whereId = SchemaLocationConfigurator::EXTERNAL_ID_COLUMN . ' = :external_id';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaOrganizerConfigurator::ORGANIZER_CDBID_COLUMN,
                ':organizer_id'
            )
            ->where($whereId)
            ->setParameters([
                SchemaOrganizerConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaOrganizerConfigurator::ORGANIZER_CDBID_COLUMN => $organizerCdbid->toNative()
            ]);

        $queryBuilder->execute();
    }
}
