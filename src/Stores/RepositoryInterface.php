<?php

namespace CultuurNet\TransformEntryStore\Stores;

interface RepositoryInterface extends
    AgeRangeInterface,
    BookingInfoInterface,
    CalendarInterface,
    ContactPointInterface,
    DescriptionRepositoryInterface,
    ImageInterface,
    LabelInterface,
    LocationInterface,
    NameInterface,
    OrganizerInterface,
    PriceInterface,
    RelationInterface,
    TargetAudienceInterface,
    ThemeRepositoryInterface,
    TypeRepositoryInterface
{

}
