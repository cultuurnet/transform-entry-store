<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\TargetAudience;

use ValueObjects\Enum\Enum;

class TargetAudience extends Enum
{
    const EVERYONE = 0;
    const MEMBERS = 1;
    const EDUCATION = 2;
}
