<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

interface OrganizerInterface
{
    /**
     * @param StringLiteral $externalId
     * @return UUID
     */
    public function getOrganizerCdbid(
        StringLiteral $externalId
    );
    
    /**
     * @param StringLiteral $externalId
     * @param UUID $organizerCdbid
     */
    public function saveOrganizerCdbid(
        StringLiteral $externalId,
        UUID $organizerCdbid
    );
    
    /**
     * @param StringLiteral $externalId
     * @param UUID $organizerCdbid
     */
    public function updateOrganizerCdbid(
        StringLiteral $externalId,
        UUID $organizerCdbid
    );
}
