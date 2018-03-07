<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\TargetAudienceInterface;

use CultuurNet\TransformEntryStore\ValueObjects\TargetAudience\TargetAudience;
use ValueObjects\StringLiteral\StringLiteral;

class StoreTargetAudienceDBALRepository extends AbstractDBALRepository implements TargetAudienceInterface
{

    /**
     * @inheritdoc
     */
    public function getTargetAudience(
        StringLiteral $externalId
    ) {
        // TODO: Implement getTargetAudience() method.
    }

    /**
     * @inheritdoc
     */
    public function saveTargetAudience(
        StringLiteral $externalId,
        TargetAudience $targetAudience
    ) {
        // TODO: Implement saveTargetAudience() method.
    }
}
