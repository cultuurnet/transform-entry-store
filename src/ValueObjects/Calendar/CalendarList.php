<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\Calendar;

use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Web\EmailAddress;
use ValueObjects\Web\Url;
use ValueObjects\ValueObjectInterface;

class CalendarList implements ValueObjectInterface
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
        return true;
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
}
