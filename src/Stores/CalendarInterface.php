<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface CalendarInterface
{
    /**
     * @param StringLiteral $externalId
     * @return array
     */
    public function getCalendar(
        StringLiteral $externalId
    );

    /**
     * @param StringLiteral $externalId
     */
    public function deleteCalendar(
        StringLiteral $externalId
    );

    /**
     * @param StringLiteral $externalId
     * @param array $calendar
     */
    public function saveCalendar(
        StringLiteral $externalId,
        array $calendar
    );
}
