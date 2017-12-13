<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\TypeRepositoryInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreTypeDBALRepository extends AbstractDBALRepository implements TypeRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getTypeId(
        StringLiteral $externalId
    ) {
        $whereId = SchemaTypeConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaTypeConfigurator::TYPE_ID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['type_id']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveTypeId(
        StringLiteral $externalId,
        StringLiteral $typeId
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([

                SchemaTypeConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaTypeConfigurator::TYPE_ID_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $typeId
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateTypeId(
        StringLiteral $externalId,
        StringLiteral $typeId
    ) {
        // TODO: Implement updateTypeId() method.
    }
}
