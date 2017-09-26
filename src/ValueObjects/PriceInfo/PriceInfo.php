<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\PriceInfo;

use ValueObjects\Money\CurrencyCode;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\ValueObjectInterface;
use ValueObjects\Money\Money;

class PriceInfo implements ValueObjectInterface
{

    /**
     * Returns a object taking PHP native value(s) as argument(s).
     *
     * @return ValueObjectInterface
     */
    public static function fromNative()
    {
        // TODO: Implement fromNative() method.
    }

    /**
     * Compare two ValueObjectInterface and tells whether they can be considered equal
     *
     * @param  ValueObjectInterface $object
     * @return bool
     */
    public function sameValueAs(ValueObjectInterface $object)
    {
        // TODO: Implement sameValueAs() method.
    }

    /**
     * Returns a string representation of the object
     *
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /**
     * PriceInfo constructor.
     * @param StringLiteral $externalId
     * @param boolean $isBasePrice
     * @param StringLiteral $name
     * @param Money $price
     * @param CurrencyCode $priceCurrency
     */
    public function __construct(
        StringLiteral $externalId,
        $isBasePrice,
        StringLiteral $name,
        Money $price,
        CurrencyCode $priceCurrency
    ) {
    }
}
