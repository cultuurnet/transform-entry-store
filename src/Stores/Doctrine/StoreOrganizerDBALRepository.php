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
        $queryBuilder->select(SchemaOrganizerConfigurator::NAME_COLUMN)
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
        // TODO: Implement saveOrganizerCdbid() method.
    }

    /**
     * @inheritdoc
     */
    public function updateOrganizerCdbid(StringLiteral $externalId, UUID $organizerCdbid)
    {
        // TODO: Implement updateOrganizerCdbid() method.
    }
}
