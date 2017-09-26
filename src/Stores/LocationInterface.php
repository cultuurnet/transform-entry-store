<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

interface LocationInterface
{
    /**
     * @param StringLiteral $externalId
     * @param UUID $locationCdbid
     */
    public function saveLocationCdbid(
        StringLiteral $externalId,
        UUID $locationCdbid
    );

    /**
     * @param StringLiteral $externalId
     * @return UUID
     */
    public function getLocationCdbid(
        StringLiteral $externalId
    );
}
