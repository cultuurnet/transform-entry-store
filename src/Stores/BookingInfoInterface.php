<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\TargetAudience\BookingInfo;
use ValueObjects\StringLiteral\StringLiteral;

interface BookingInfoInterface
{
    /**
     * @param StringLiteral $externalId
     * @param BookingInfo $bookingInfo
     */
    public function saveBookingInfo(
        StringLiteral $externalId,
        BookingInfo $bookingInfo
    );

    /**
     * @param StringLiteral $externalId
     * @return BookingInfo
     */
    public function getBookingInfo(
        StringLiteral $externalId
    );
}
