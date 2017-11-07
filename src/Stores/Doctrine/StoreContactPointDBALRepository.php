<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\ContactPointInterface;
use CultuurNet\TransformEntryStore\ValueObjects\ContactPoint\ContactPoint;
use ValueObjects\StringLiteral\StringLiteral;

class StoreContactPointDBALRepository extends AbstractDBALRepository implements ContactPointInterface
{

    /**
     * @param StringLiteral $externalId
     * @return array
     */
    public function getContactPoints(
        StringLiteral $externalId
    ) {
        // TODO: Implement getContactPoints() method.
    }

    /**
     * @param StringLiteral $externalId
     * @param ContactPoint $contactPoint
     */
    public function saveContactPoint(
        StringLiteral $externalId,
        ContactPoint $contactPoint
    ) {
        // TODO: Implement saveContactPoint() method.
    }

    /**
     * @param StringLiteral $externalId
     * @param ContactPoint $contactPoint
     */
    public function updateContactPoint(
        StringLiteral $externalId,
        ContactPoint $contactPoint
    ) {
        // TODO: Implement updateContactPoint() method.
    }
}
