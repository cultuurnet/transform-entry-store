<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface PriceInterface
{
    /**
     * @param StringLiteral $externalId
     * @return array
     */
    public function getPrice(
        StringLiteral $externalId
    );

    /**
     * @param StringLiteral $externalId
     */
    public function deletePrice(
        StringLiteral $externalId
    );

    /**
     * @param StringLiteral $externalId
     * @param $isBasePrice
     * @param $name
     * @param $price
     * @param $currency
     */
    public function savePrice(
        StringLiteral $externalId,
        $isBasePrice,
        $name,
        $price,
        $currency
    );
}
