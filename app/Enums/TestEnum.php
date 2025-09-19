<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum TestEnum: string implements HasColor, HasLabel
{
    case CONFIRMED = 'confirmed';
    case CANCELLED = 'cancelled';

    public function canCancel(): bool
    {
        return match ($this) {
            self::CONFIRMED => true,
            self::CANCELLED => false,
        };
    }

    public function canBeSeated(): bool
    {
        return match ($this) {
            self::CONFIRMED => true,
            self::CANCELLED => false,
        };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::CONFIRMED => 'Confirmed',
            self::CANCELLED => 'Cancelled',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::CONFIRMED => 'success',
            self::CANCELLED => 'danger',
        };
    }
}
