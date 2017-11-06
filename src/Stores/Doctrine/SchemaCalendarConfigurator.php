<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Doctrine\DBAL\SchemaConfiguratorInterface;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use ValueObjects\StringLiteral\StringLiteral;

class SchemaCalendarConfigurator implements SchemaConfiguratorInterface
{
    const EXTERNAL_ID_COLUMN = 'external_id';
    const DATE_COLUMN = 'date';
    const TIME_START_COLUMN = 'time_start';
    const TIME_END_COLOMN = 'time_end';

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
        $table->addColumn(self::DATE_COLUMN, Type::DATE)
            ->setNotnull(true);
        $table->addColumn(self::TIME_START_COLUMN, TYPE::TIME)
            ->setNotnull(true);
        $table->addColumn(self::TIME_END_COLOMN, TYPE::TIME);

        $schemaManager->createTable($table);
    }
}
