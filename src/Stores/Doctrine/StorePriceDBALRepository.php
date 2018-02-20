<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\PriceInterface;
use ValueObjects\StringLiteral\StringLiteral;

class StorePriceDBALRepository extends AbstractDBALRepository implements PriceInterface
{

    /**
     * @inheritdoc
     */
    public function getPrice(StringLiteral $externalId)
    {
        $whereId = SchemaPriceInfoConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(
            SchemaPriceInfoConfigurator::IS_BASE_PRICE_COLUMN,
            SchemaPriceInfoConfigurator::NAME_COLUMN,
            SchemaPriceInfoConfigurator::PRICE_COLUMN,
            SchemaPriceInfoConfigurator::CURRENCY_COLUMN
        )
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
    public function deletePrice(
        StringLiteral $externalId
    ) {
        // TODO: Implement deletePrice() method.
    }

    /**
     * @inheritdoc
     */
    public function savePrice(
        StringLiteral $externalId,
        $isBasePrice,
        $name,
        $price,
        $currency
    ) {
        $isBasePriceInt = $isBasePrice ? 1 : 0;
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaPriceInfoConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaPriceInfoConfigurator::IS_BASE_PRICE_COLUMN => '?',
                SchemaPriceInfoConfigurator::NAME_COLUMN => '?',
                SchemaPriceInfoConfigurator::PRICE_COLUMN => '?',
                SchemaPriceInfoConfigurator::CURRENCY_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $isBasePriceInt,
                $name,
                $price,
                $currency
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updatePrice(
        StringLiteral $externalId,
        $isBasePrice,
        $name,
        $price,
        $currency
    ) {
        $whereId = SchemaPriceInfoConfigurator::EXTERNAL_ID_COLUMN . ' = :external_id';
        $nameId = SchemaPriceInfoConfigurator::NAME_COLUMN . ' = :name';

        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->update($this->getTableName()->toNative())
            ->set(
                SchemaPriceInfoConfigurator::PRICE_COLUMN,
                ':price'
            )
            ->where($whereId)
            ->andWhere($nameId)
            ->setParameters([
                SchemaPriceInfoConfigurator::NAME_COLUMN =>$name,
                SchemaPriceInfoConfigurator::EXTERNAL_ID_COLUMN => $externalId->toNative(),
                SchemaPriceInfoConfigurator::PRICE_COLUMN => $price
            ]);

        $queryBuilder->execute();
    }
}
