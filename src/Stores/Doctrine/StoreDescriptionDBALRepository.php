<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\DescriptionRepositoryInterface;
use ValueObjects\StringLiteral\StringLiteral;

class StoreDescriptionDBALRepository extends AbstractDBALRepository implements DescriptionRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getDescription(
        StringLiteral $externalId
    ) {
        $whereId = SchemaDescriptionConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaDescriptionConfigurator::DESCRIPTION_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['description_id']);
        }
    }
    
    /**
     * @inheritdoc
     */
    public function saveDescription(
        StringLiteral $externalId,
        StringLiteral $description
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaDescriptionConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaDescriptionConfigurator::DESCRIPTION_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $description
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateDescription(
        StringLiteral $externalId,
        StringLiteral $description
    ) {
        $whereId = SchemaDescriptionConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaDescriptionConfigurator::DESCRIPTION_COLUMN,
                ':description'
            )
            ->where($whereId)
            ->setParameters([
                SchemaDescriptionConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaDescriptionConfigurator::DESCRIPTION_COLUMN => $description->toNative()
            ]);

        $queryBuilder->execute();
    }
}
