<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Doctrine\DBAL\SchemaConfiguratorInterface;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use ValueObjects\StringLiteral\StringLiteral;

class SchemaBookingInfoConfigurator implements SchemaConfiguratorInterface
{
    const EXTERNAL_ID_COLUMN = 'external_id';
    const URL_COLUMN = 'url';
    const URL_LABEL_COLUMN = 'url_label';
    const EMAIL_COLUMN = 'email';
    const PHONE_COLUMN = 'phone';
    const AVAILABILITY_STARTS_COLUMN = 'availabilityStarts';
    const AVAILABILITY_ENDS_COLUMN = 'availabilityEnds';

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
        $table->addColumn(self::URL_COLUMN, Type::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::EMAIL_COLUMN, TYPE::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::PHONE_COLUMN, TYPE::STRING)
            ->setLength(128)
            ->setNotnull(true);
        $table->addColumn(self::AVAILABILITY_STARTS_COLUMN, TYPE::DATETIMETZ)
            ->setNotnull(true);
        $table->addColumn(self::AVAILABILITY_STARTS_COLUMN, TYPE::DATETIMETZ)
            ->setNotnull(true);


        $table->addUniqueIndex([self::EXTERNAL_ID_COLUMN]);

        $schemaManager->createTable($table);
    }
}
