<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\ContactPoint\ContactPoint;
use ValueObjects\StringLiteral\StringLiteral;

interface ContactPointInterface
{
    /**
     * @param StringLiteral $externalId
     * @return array
     */
    public function getContactPoints(
        StringLiteral $externalId
    );
    
    /**
     * @param StringLiteral $externalId
     * @param ContactPoint $contactPoint
     */
    public function saveContactPoint(
        StringLiteral $externalId,
        ContactPoint $contactPoint
    );
    
    /**
     * @param StringLiteral $externalId
     * @param ContactPoint $contactPoint
     */
    public function updateContactPoint(
        StringLiteral $externalId,
        ContactPoint $contactPoint
    );
}
