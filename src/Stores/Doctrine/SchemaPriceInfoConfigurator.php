<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Doctrine\DBAL\SchemaConfiguratorInterface;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use ValueObjects\StringLiteral\StringLiteral;

class SchemaPriceInfoConfigurator implements SchemaConfiguratorInterface
{
    const EXTERNAL_ID_COLUMN = 'external_id';
    const IS_BASE_PRICE_COLUMN = 'is_base_price';
    const NAME_COLUMN = 'name';
    const PRICE_COLUMN = 'price';
    const CURRENCY_COLUMN = 'currency';

    /**
     * @var StringLiteral
     */
    protected $tableName;

    /**
     * @param StringLiteral $tableName
     */
    public function __construct(StringLiteral $tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @inheritdoc
     */
    public function configure(AbstractSchemaManager $schemaManager)
    {
        $schema = $schemaManager->createSchema();
        $table = $schema->createTable($this->tableName->toNative());

        $table->addColumn(self::EXTERNAL_ID_COLUMN, Type::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::IS_BASE_PRICE_COLUMN, Type::BOOLEAN)
            ->setNotnull(true);
        $table->addColumn(self::NAME_COLUMN, Type::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::PRICE_COLUMN, TYPE::DECIMAL)
            ->setNotnull(true);
        $table->addColumn(self::CURRENCY_COLUMN, TYPE::STRING)
            ->setLength(3)
            ->setNotnull(true);


        $schemaManager->createTable($table);
    }
}
