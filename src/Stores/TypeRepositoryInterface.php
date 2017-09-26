<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface TypeRepositoryInterface
{
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $typeId
     */
    public function saveType(
        StringLiteral $externalId,
        StringLiteral $typeId
    );

    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getTypeId(
        StringLiteral $externalId
    );
}
