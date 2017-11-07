<?php

namespace CultuurNet\TransformEntryStore\Stores;

use ValueObjects\StringLiteral\StringLiteral;

interface ThemeRepositoryInterface
{
    /**
     * @param StringLiteral $externalId
     * @return StringLiteral
     */
    public function getThemeId(
        StringLiteral $externalId
    );
    
     /**
     * @param StringLiteral $externalId
     * @param StringLiteral $themeId
     */
    public function saveThemeId(
        StringLiteral $externalId,
        StringLiteral $themeId
    );
    
    /**
     * @param StringLiteral $externalId
     * @param StringLiteral $themeId
     */
    public function updateThemeId(
        StringLiteral $externalId,
        StringLiteral $themeId
    );
}
