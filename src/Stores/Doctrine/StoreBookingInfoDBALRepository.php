<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\BookingInfoInterface;
use CultuurNet\TransformEntryStore\ValueObjects\BookingInfo\BookingInfo;
use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

class StoreBookingInfoDBALRepository extends AbstractDBALRepository implements BookingInfoInterface
{
    /**
     * @inheritdoc
     */
    public function getBookingInfo(
        StringLiteral $externalId
    ) {
        $whereId =  SchemaAgeRangeConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaRelationConfigurator::CDBID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();
        if (empty($resultSet)) {
            return null;
        } else {
            return UUID::fromNative($resultSet[0]['cdbid']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveBookingInfo(
        StringLiteral $externalId,
        BookingInfo $bookingInfo
    ) {
        // TODO: Implement saveAgeRange() method.
    }

    /**
     * @inheritdoc
     */
    public function updateBookingInfo(
        StringLiteral $externalId,
        BookingInfo $bookingInfo
    ) {
        // TODO: Implement updateAgeRange() method.
    }
}
