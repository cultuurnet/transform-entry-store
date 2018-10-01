<?php

namespace CultuurNet\TransformEntryStore\Stores;

use CultuurNet\TransformEntryStore\ValueObjects\Language\LanguageCode;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

interface ImageInterface
{
    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getImageId($externalId);

    /**
     * @param StringLiteral $externalId
     * @param UUID $imageId
     * @param StringLiteral $description
     * @param StringLiteral $copyright
     * @param LanguageCode $languageCode
     * @return StringLiteral
     */
    public function saveImage(
        StringLiteral $externalId,
        UUID $imageId,
        StringLiteral $description,
        StringLiteral $copyright,
        LanguageCode $languageCode
    );

    /**
     * @param StringLiteral $externalId
     * @param UUID $imageId
     * @param StringLiteral $description
     * @param StringLiteral $copyright
     * @param LanguageCode $languageCode
     * @return StringLiteral
     */
    public function updateImage(
        StringLiteral $externalId,
        UUID $imageId,
        StringLiteral $description,
        StringLiteral $copyright,
        LanguageCode $languageCode
    );
}
