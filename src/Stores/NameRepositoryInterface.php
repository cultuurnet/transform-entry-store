<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface NameRepositoryInterface
{
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $name
     */
    public function saveName(
        StringLiteral $externalId,
        StringLiteral $name
    );

    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getName(
        StringLiteral $externalId
    );
}
