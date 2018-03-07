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
     * @param $date
     * @param $timeStart
     * @param $timeEnd
     */
    public function saveCalendar(
        StringLiteral $externalId,
        $date,
        $timeStart,
        $timeEnd
    );
}
