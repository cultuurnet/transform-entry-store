<?php

namespace CultuurNet\TransformEntryStore\Stores;

interface RepositoryInterface extends
    AgeRangeInterface,
    BookingInfoInterface,
    CalendarInterface,
    ContactPointInterface,
    DescriptionRepositoryInterface,
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
