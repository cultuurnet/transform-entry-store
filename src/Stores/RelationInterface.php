<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

interface RelationInterface
{
    /**
     * @param StringLiteral $externalId
     * @return UUID
     */
    public function getCdbid(
        StringLiteral $externalId
    );

    /**
     * @param UUID $cdbid
     * @return StringLiteral
     */
    public function getExternalId(
        UUID $cdbid
    );
    
    /**
     * @param StringLiteral $externalId
     * @param UUID $cdbid
     */
    public function saveCdbid(
        StringLiteral $externalId,
        UUID $cdbid
    );
}
