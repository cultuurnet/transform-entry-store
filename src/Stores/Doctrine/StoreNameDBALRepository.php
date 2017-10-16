<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\NameRepositoryInterface;
use ValueObjects\StringLiteral\StringLiteral;

class StoreNameDBALRepository extends AbstractDBALRepository implements NameRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getName(StringLiteral $externalId)
    {
          $whereId = SchemaNameConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaNameConfigurator::NAME_COLUMN,
                ':name'
            )
            ->where($whereId)
            ->setParameters([
                SchemaNameConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative()
            ]);

        $queryBuilder->execute();
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
                $externalId,
                $name
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateName(StringLiteral $externalId, StringLiteral $name)
    {
        $whereId = SchemaNameConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaNameConfigurator::NAME_COLUMN,
                ':name'
            )
            ->where($whereId)
            ->setParameters([
                SchemaNameConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaNameConfigurator::NAME_COLUMN => $name->toNative()
            ]);

        $queryBuilder->execute();
    }
}
