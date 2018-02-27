<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

interface EventProductionInterface
{
    /**
     * @param StringLiteral $externalId
     * @return array
     */
    public function getCdbids(
        StringLiteral $externalId
    );

    /**
     * @param StringLiteral $externalIdEvent
     * @param StringLiteral $externalIdProduction
     * @return void
     */
    public function saveEventProduction(
        StringLiteral $externalIdEvent,
        StringLiteral $externalIdProduction
    );
}
