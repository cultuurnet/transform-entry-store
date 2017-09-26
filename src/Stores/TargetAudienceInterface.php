<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\TargetAudience\TargetAudience;
use ValueObjects\StringLiteral\StringLiteral;

interface TargetAudienceInterface
{
    /**
     * @param StringLiteral $externalId
     * @param TargetAudience $targetAudience
     */
    public function saveTargetAudience(
        StringLiteral $externalId,
        TargetAudience $targetAudience
    );

    /**
     * @param StringLiteral $externalId
     * @return TargetAudience
     */
    public function getTargetAudience(
        StringLiteral $externalId
    );
}
