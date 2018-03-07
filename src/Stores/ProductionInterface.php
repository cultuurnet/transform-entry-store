<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

interface ProductionInterface
{
    /**
     * @param StringLiteral $externalId
     * @return UUID
     */
    public function getProductionCdbid(
        StringLiteral $externalId
    );
    
    /**
     * @param StringLiteral $externalId
     * @param UUID $cdbid
     */
    public function saveProductionCdbid(
        StringLiteral $externalId,
        UUID $cdbid
    );
}
