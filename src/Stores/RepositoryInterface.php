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
    RelationInterface,
    TargetAudienceInterface,
    ThemeRepositoryInterface,
    TypeRepositoryInterface
{

}
