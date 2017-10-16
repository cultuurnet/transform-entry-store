<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\BookingInfo\BookingInfo;
use ValueObjects\StringLiteral\StringLiteral;

interface BookingInfoInterface
{
    /**
     * @param StringLiteral $externalId
     * @return BookingInfo
     */
    public function getBookingInfo(
        StringLiteral $externalId
    );

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
     * @param BookingInfo $bookingInfo
     */
    public function updateBookingInfo(
        StringLiteral $externalId,
        BookingInfo $bookingInfo
    );
}
