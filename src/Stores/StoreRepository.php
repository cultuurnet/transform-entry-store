<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\AgeRange\AgeRange;
use CultuurNet\TransformEntryStore\ValueObjects\BookingInfo\BookingInfo;
use CultuurNet\TransformEntryStore\ValueObjects\ContactPoint\ContactPoint;
use CultuurNet\TransformEntryStore\ValueObjects\TargetAudience\TargetAudience;
use ValueObjects\DateTime\Date;
use ValueObjects\DateTime\Time;
use ValueObjects\Identity\UUID;
use ValueObjects\StringLiteral\StringLiteral;

class StoreRepository implements RepositoryInterface
{
    /**
     * @var AgeRangeInterface
     */
    private $ageRangeRepository;

    /**
     * @var BookingInfoInterface
     */
    private $bookingInfoRepository;

    /**
     * @var CalendarInterface
     */
    private $calendarRepository;

    /**
     * @var ContactPointInterface
     */
    private $contactPointRepository;

    /**
     * @var DescriptionRepositoryInterface
     */
    private $descriptionRepository;

    /**
     * @var LabelInterface
     */
    private $labelRepository;

    /**
     * @var LocationInterface
     */
    private $locationRepository;

    /**
     * @var NameInterface
     */
    private $nameRepository;

    /**
     * @var OrganizerInterface
     */
    private $organizerRepository;

    /**
     * @var RelationInterface
     */
    private $relationRepository;

    /**
     * @var TargetAudienceInterface
     */
    private $targetAudienceRepository;

    /**
     * @var ThemeRepositoryInterface
     */
    private $themeRepository;

    /**
     * @var TypeRepositoryInterface
     */
    private $typeRepository;

    public function __construct(
        AgeRangeInterface $ageRangeRepository,
        BookingInfoInterface $bookingInfoRepository,
        CalendarInterface $calendarRepository,
        ContactPointInterface $contactPointRepository,
        DescriptionRepositoryInterface $descriptionRepository,
        LabelInterface $labelRepository,
        LocationInterface $locationRepository,
        NameInterface $nameRepository,
        OrganizerInterface $organizerRepository,
        RelationInterface $relationRepository,
        TargetAudienceInterface $targetAudienceRepository,
        ThemeRepositoryInterface $themeRepository,
        TypeRepositoryInterface $typeRepository
    ) {
        $this->ageRangeRepository = $ageRangeRepository;
        $this->bookingInfoRepository = $bookingInfoRepository;
        $this->calendarRepository = $calendarRepository;
        $this->contactPointRepository = $contactPointRepository;
        $this->descriptionRepository = $descriptionRepository;
        $this->labelRepository = $labelRepository;
        $this->locationRepository = $locationRepository;
        $this->nameRepository = $nameRepository;
        $this->organizerRepository = $organizerRepository;
        $this->relationRepository = $relationRepository;
        $this->targetAudienceRepository = $targetAudienceRepository;
        $this->themeRepository = $themeRepository;
        $this->typeRepository = $typeRepository;
    }


    /**
     * @inheritdoc
     */
    public function getAgeRange(
        StringLiteral $externalId
    ) {
        return $this->ageRangeRepository->getAgeRange($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    ) {
        $this->ageRangeRepository->saveAgeRange($externalId, $ageRange);
    }

    /**
     * @inheritdoc
     */
    public function updateAgeRange(
        StringLiteral $externalId,
        AgeRange $ageRange
    ) {
        $this->ageRangeRepository->updateAgeRange($externalId, $ageRange);
    }

    /**
     * @inheritdoc
     */
    public function getBookingInfo(
        StringLiteral $externalId
    ) {
        return $this->bookingInfoRepository->getBookingInfo($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveBookingInfo(
        StringLiteral $externalId,
        BookingInfo $bookingInfo
    ) {
        $this->bookingInfoRepository->saveBookingInfo($externalId, $bookingInfo);
    }

    /**
     * @inheritdoc
     */
    public function updateBookingInfo(
        StringLiteral $externalId,
        BookingInfo $bookingInfo
    ) {
        $this->updateBookingInfo($externalId, $bookingInfo);
    }

    /**
     * @inheritdoc
     */
    public function getCalendar(
        StringLiteral $externalId
    ) {
        return $this->calendarRepository->getCalendar($externalId);
    }

    /**
     * @inheritdoc
     */
    public function deleteCalendar(
        StringLiteral $externalId
    ) {
        $this->calendarRepository->deleteCalendar($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveCalendar(
        StringLiteral $externalId,
        $date,
        $timeStart,
        $timeEnd
    ) {
        $this->calendarRepository->saveCalendar($externalId, $date, $timeStart, $timeEnd);
    }

    /**
     * @inheritdoc
     */
    public function getContactPoints(
        StringLiteral $externalId
    ) {
        return $this->contactPointRepository->getContactPoints($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveContactPoint(
        StringLiteral $externalId,
        ContactPoint $contactPoint
    ) {
        $this->saveContactPoint($externalId, $contactPoint);
    }

    /**
     * @inheritdoc
     */
    public function updateContactPoint(
        StringLiteral $externalId,
        ContactPoint $contactPoint
    ) {
        $this->contactPointRepository->updateContactPoint($externalId, $contactPoint);
    }

    /**
     * @inheritdoc
     */
    public function getDescription(
        StringLiteral $externalId
    ) {
        return $this->descriptionRepository->getDescription($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveDescription(
        StringLiteral $externalId,
        StringLiteral $description
    ) {
        $this->descriptionRepository->saveDescription($externalId, $description);
    }

    /**
     * @inheritdoc
     */
    public function updateDescription(
        StringLiteral $externalId,
        StringLiteral $description
    ) {
        $this->updateDescription($externalId, $description);
    }

    /**
     * @inheritdoc
     */
    public function addLabel(
        StringLiteral $externalId,
        StringLiteral $label
    ) {
        $this->labelRepository->addLabel($externalId, $label);
    }

    /**
     * @inheritdoc
     */
    public function deleteLabel(
        StringLiteral $externalId,
        StringLiteral $label
    ) {
        $this->labelRepository->deleteLabel($externalId, $label);
    }

    /**
     * @inheritdoc
     */
    public function getLocationCdbid(
        StringLiteral $externalId
    ) {
        return $this->locationRepository->getLocationCdbid($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveLocationCdbid(
        StringLiteral $externalId,
        UUID $locationCdbid
    ) {
        $this->locationRepository->saveLocationCdbid($externalId, $locationCdbid);
    }

    /**
     * @inheritdoc
     */
    public function updateLocationCdbid(
        StringLiteral $externalId,
        UUID $locationCdbid
    ) {
        $this->locationRepository->updateLocationCdbid($externalId, $locationCdbid);
    }

    /**
     * @inheritdoc
     */
    public function getName(
        StringLiteral $externalId
    ) {
        return $this->nameRepository->getName($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveName(
        StringLiteral $externalId,
        StringLiteral $name
    ) {
        $this->nameRepository->saveName($externalId, $name);
    }

    /**
     * @inheritdoc
     */
    public function updateName(
        StringLiteral $externalId,
        StringLiteral $name
    ) {
        $this->nameRepository->updateName($externalId, $name);
    }

    /**
     * @inheritdoc
     */
    public function getOrganizerCdbid(
        StringLiteral $externalId
    ) {
        return $this->organizerRepository->getOrganizerCdbid($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveOrganizerCdbid(
        StringLiteral $externalId,
        UUID $organizerCdbid
    ) {
        $this->organizerRepository->saveOrganizerCdbid($externalId, $organizerCdbid);
    }

    /**
     * @inheritdoc
     */
    public function updateOrganizerCdbid(
        StringLiteral $externalId,
        UUID $organizerCdbid
    ) {
        $this->organizerRepository->updateOrganizerCdbid($externalId, $organizerCdbid);
    }

    /**
     * @inheritdoc
     */
    public function getCdbid(
        StringLiteral $externalId
    ) {
        return $this->relationRepository->getCdbid($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveCdbid(
        StringLiteral $externalId,
        UUID $cdbid
    ) {
        $this->relationRepository->saveCdbid($externalId, $cdbid);
    }

    /**
     * @inheritdoc
     */
    public function getTargetAudience(
        StringLiteral $externalId
    ) {
        return $this->targetAudienceRepository->getTargetAudience($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveTargetAudience(
        StringLiteral $externalId,
        TargetAudience $targetAudience
    ) {
        $this->targetAudienceRepository->saveTargetAudience($externalId, $targetAudience);
    }

    /**
     * @inheritdoc
     */
    public function getThemeId(
        StringLiteral $externalId
    ) {
        return $this->themeRepository->getThemeId($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveThemeId(
        StringLiteral $externalId,
        StringLiteral $themeId
    ) {
        $this->themeRepository->saveThemeId($externalId, $themeId);
    }

    /**
     * @inheritdoc
     */
    public function updateThemeId(
        StringLiteral $externalId,
        StringLiteral $themeId
    ) {
        $this->themeRepository->updateThemeId($externalId, $themeId);
    }

    /**
     * @inheritdoc
     */
    public function getTypeId(
        StringLiteral $externalId
    ) {
        return $this->getTypeId($externalId);
    }

    /**
     * @inheritdoc
     */
    public function saveTypeId(
        StringLiteral $externalId,
        StringLiteral $typeId
    ) {
        $this->typeRepository->saveTypeId($externalId, $typeId);
    }

    /**
     * @inheritdoc
     */
    public function updateTypeId(
        StringLiteral $externalId,
        StringLiteral $typeId
    ) {
        $this->typeRepository->updateTypeId($externalId, $typeId);
    }
}
