<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\NameInterface;
use ValueObjects\StringLiteral\StringLiteral;

class StoreNameDBALRepository extends AbstractDBALRepository implements NameInterface
{
    /**
     * @inheritdoc
     */
    public function getName(StringLiteral $externalId)
    {
        $whereId = SchemaNameConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaNameConfigurator::NAME_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId->toNative());

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['name_id']);
        }
    }

     /**
     * @inheritdoc
     */
    public function saveName(StringLiteral $externalId, StringLiteral $name)
    {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaNameConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaNameConfigurator::NAME_COLUMN => '?'
            ])
            ->setParameters([
                $externalId->toNative(),
                $name->toNative()
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateName(StringLiteral $externalId, StringLiteral $name)
    {
        $whereId = SchemaNameConfigurator::EXTERNAL_ID_COLUMN . ' = :external_id';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaNameConfigurator::NAME_COLUMN,
                ':name_id'
            )
            ->where($whereId)
            ->setParameters([
                SchemaNameConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaNameConfigurator::NAME_COLUMN => $name->toNative()
            ]);

        $queryBuilder->execute();
    }
}
