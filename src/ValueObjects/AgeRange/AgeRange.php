<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\AgeRange;

use ValueObjects\ValueObjectInterface;
use ValueObjects\Number\Integer as IntegerLiteral;

class AgeRange implements ValueObjectInterface
{
    /**
     * @var IntegerLiteral
     */
    private $ageFrom;

    /**
     * @var IntegerLiteral
     */
    private $ageTo;

    /**
     * @return IntegerLiteral
     */
    public function getAgeFrom()
    {
        return $this->ageFrom;
    }

    /**
     * @return IntegerLiteral
     */
    public function getAgeTo()
    {
        return $this->ageTo;
    }

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
        return $this->ageFrom->toNative() . '-' . $this->ageTo->toNative();
    }

    /**
     * AgeRange constructor.
     * @param IntegerLiteral $ageFrom
     * @param IntegerLiteral $ageTo
     */
    public function __construct(IntegerLiteral $ageFrom, IntegerLiteral $ageTo)
    {
        $this->ageFrom = $ageFrom;
        $this->ageTo = $ageTo;
    }
}
