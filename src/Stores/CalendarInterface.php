<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\DateTime\Date;
use ValueObjects\DateTime\Time;
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
     * @return
     * @internal param array $calendar
     */
    public function saveCalendar(
        StringLiteral $externalId,
        $date,
        $timeStart,
        $timeEnd
    );
}
