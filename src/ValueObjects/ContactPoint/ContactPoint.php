<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\ContactPoint;

use ValueObjects\ValueObjectInterface;

abstract class ContactPoint implements ValueObjectInterface
{
    /**
     * @var ContactPointType
     */
    private $contactPointType;

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
     * ContactPoint constructor.
     * @param ContactPointType $contactPointType
     */
    public function __construct(ContactPointType $contactPointType)
    {
        $this->contactPointType = $contactPointType;
    }
}
