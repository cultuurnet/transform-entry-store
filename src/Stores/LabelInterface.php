<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface LabelInterface
{
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $label
     */
    public function addLabel(
        StringLiteral $externalId,
        StringLiteral $label
    );
    
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $label
     */
    public function deleteLabel(
        StringLiteral $externalId,
        StringLiteral $label
    );
}
