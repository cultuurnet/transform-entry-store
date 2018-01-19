<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Doctrine\DBAL\SchemaConfiguratorInterface;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use ValueObjects\StringLiteral\StringLiteral;

class SchemaImageConfigurator implements SchemaConfiguratorInterface
{
    const EXTERNAL_ID_COLUMN = 'external_id';
    const IMAGE_ID_COLUMN = 'image_id';
    const DESCRIPTION_COLUMN = 'description';
    const COPYRIGHT_COLUMN = 'copyright';
    const LANGUAGE_ID_COLUMN = 'language_id';

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
        $table->addColumn(self::IMAGE_ID_COLUMN, Type::GUID)
            ->setLength(36)
            ->setNotnull(true);
        $table->addColumn(self::DESCRIPTION_COLUMN, Type::STRING)
            ->setLength(256)
            ->setNotnull(true);
        $table->addColumn(self::COPYRIGHT_COLUMN, TYPE::STRING)
            ->setLength(256)
            ->setNotnull(true);
        $table->addColumn(self::LANGUAGE_ID_COLUMN, Type::STRING)
            ->setLength(2)
            ->setNotnull(true);

        $schemaManager->createTable($table);
    }
}
