<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface TypeRepositoryInterface
{
    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getTypeId(
        StringLiteral $externalId
    );
    
        /**
     * @param StringLiteral $externalId
     * @param StringLiteral $typeId
     */
    public function saveTypeId(
        StringLiteral $externalId,
        StringLiteral $typeId
    );
    
     /**
     * @param StringLiteral $externalId
     * @param StringLiteral $typeId
     */
    public function updateTypeId(
        StringLiteral $externalId,
        StringLiteral $typeId
    );
}
