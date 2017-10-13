<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface DescriptionRepositoryInterface
{
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $description
     */
    public function saveDescription(
        StringLiteral $externalId,
        StringLiteral $description
    );

    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $description
     */
    public function updateDescription(
        StringLiteral $externalId,
        StringLiteral $description
    );

    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getDescription(
        StringLiteral $externalId
    );
}
