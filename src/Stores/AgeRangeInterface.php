<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\AgeRange\AgeRange;
use ValueObjects\StringLiteral\StringLiteral;

interface AgeRangeInterface
{
    /**
     * @param StringLiteral $externalId
     * @param AgeRange $ageRange
     */
    public function saveAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    );

    /**
     * @param StringLiteral $externalId
     * @return AgeRange
     */
    public function getAgeRange(
        StringLiteral $externalId
    );
}
