<?php

namespace Passionatelaraveldev\Creatify\Enum\Avatar;

use Passionatelaraveldev\Creatify\Concerns\HasEnumConvert;

enum AgeRange: string
{
    use HasEnumConvert;

    case CHILD = 'child';
    case TEEN = 'teen';
    case ADULT = 'adult';
    case SENIOR = 'senior';

    /**
     * get label from enum
     */
    public function label(): string
    {
        return match ($this) {
            self::CHILD => 'Child',
            self::TEEN => 'Teen',
            self::ADULT => 'Adult',
            self::SENIOR => 'Senior'
        };
    }
}
