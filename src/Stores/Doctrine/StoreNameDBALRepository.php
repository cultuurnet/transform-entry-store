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
                SchemaDescriptionConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaDescriptionConfigurator::DESCRIPTION_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $name
            ]);

        $queryBuilder->execute();
    }
}
