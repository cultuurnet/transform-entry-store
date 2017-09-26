<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface ThemeRepositoryInterface
{
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $themeId
     */
    public function saveName(
        StringLiteral $externalId,
        StringLiteral $themeId
    );

    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getThemeId(
        StringLiteral $externalId
    );
}
