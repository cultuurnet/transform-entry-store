<?php

namespace CultuurNet\TransformEntryStore\Stores;

interface RepositoryInterface extends
    AgeRangeInterface,
    BookingInfoInterface,
    CalendarInterface,
    ContactPointInterface,
    DescriptionRepositoryInterface,
    EventProductionInterface,
    ImageInterface,
    LabelInterface,
    LocationInterface,
    NameInterface,
    OrganizerInterface,
    PriceInterface,
    ProductionInterface,
    RelationInterface,
    TargetAudienceInterface,
    ThemeRepositoryInterface,
    TypeRepositoryInterface
{

}
