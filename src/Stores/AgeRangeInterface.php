<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\Number\Integer as IntegerLiteral;
use ValueObjects\StringLiteral\StringLiteral;

interface AgeRangeInterface
{
    /**
     * @param StringLiteral $externalId
     * @param IntegerLiteral $ageFrom
     * @param IntegerLiteral $ageTo
     * @return
     */
    public function saveAgeRange(
        StringLiteral $externalId,
        IntegerLiteral $ageFrom,
        IntegerLiteral $ageTo
    );

    /**
     * @param StringLiteral $externalId
     * @return IntegerLiteral
     */
    public function getAgeFrom(
        StringLiteral $externalId
    );

    /**
     * @param StringLiteral $externalId
     * @return IntegerLiteral
     */
    public function getAgeTo(
        StringLiteral $externalId
    );
}
