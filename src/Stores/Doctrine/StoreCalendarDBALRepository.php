<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\CalendarInterface;
use ValueObjects\StringLiteral\StringLiteral;

class StoreCalendarDBALRepository extends AbstractDBALRepository implements CalendarInterface
{
    /**
     * @inheritdoc
     */
    public function getCalendar(
        StringLiteral $externalId
    ) {
        $whereId = SchemaCalendarConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(
            SchemaCalendarConfigurator::DATE_COLUMN,
            SchemaCalendarConfigurator::TIME_START_COLUMN,
            SchemaCalendarConfigurator::TIME_END_COLUMN
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
    public function deleteCalendar(
        StringLiteral $externalId
    ) {
        // TODO: Implement deleteCalendar() method.
    }

    /**
     * @inheritdoc
     */
    public function saveCalendar(
        StringLiteral $externalId,
        array $calendar
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaCalendarConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaCalendarConfigurator::DATE_COLUMN => '?',
                SchemaCalendarConfigurator::TIME_START_COLUMN => '?',
                SchemaCalendarConfigurator::TIME_END_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $calendar[1],
                $calendar[2],
                $calendar[3]
            ]);

        $queryBuilder->execute();
    }
}
