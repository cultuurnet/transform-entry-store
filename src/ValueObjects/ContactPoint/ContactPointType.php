<?php

namespace CultuurNet\TransformEntryStore\ValueObjects\ContactPoint;

use ValueObjects\Enum\Enum;

class ContactPointType extends enum
{
    const URL = 'url';
    const EMAIL = 'email';
    const PHONE = 'phone';
}
