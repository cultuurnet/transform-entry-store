<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\TargetAudience;

use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Web\EmailAddress;
use ValueObjects\Web\Url;
use ValueObjects\ValueObjectInterface;

class BookingInfo implements ValueObjectInterface
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
     * @param StringLiteral $externalId
     * @param Url $url
     * @param StringLiteral $urlLabel
     * @param EmailAddress $emailAddress
     */
    public function __construct(
        StringLiteral $externalId,
        Url $url,
        StringLiteral $urlLabel,
        EmailAddress $emailAddress
    ) {
    }
}
