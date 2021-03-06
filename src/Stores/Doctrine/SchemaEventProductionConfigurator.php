<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Doctrine\DBAL\SchemaConfiguratorInterface;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use ValueObjects\StringLiteral\StringLiteral;

class SchemaEventProductionConfigurator implements SchemaConfiguratorInterface
{
    const EXTERNAL_ID_EVENT_COLUMN = 'external_id_event';
    const EXTERNAL_ID_PRODUCTION_COLUMN = 'external_id_production';
    const CDBID_EVENT_COLUMN = 'cdbid_event';

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

        $table->addColumn(self::EXTERNAL_ID_EVENT_COLUMN, Type::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::EXTERNAL_ID_PRODUCTION_COLUMN, Type::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::CDBID_EVENT_COLUMN, Type::GUID)
            ->setNotnull(true);


        $table->addUniqueIndex([self::EXTERNAL_ID_EVENT_COLUMN, self::CDBID_EVENT_COLUMN]);

        $schemaManager->createTable($table);
    }
}
