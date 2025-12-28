<?php

namespace App\Enums;

use Livewire\Wireable;

enum MembershipType: string implements Wireable
{
    case STANDARD = 'standard';
    case PREMIUM = 'premium';

    /**
     * İnsan okunabilir etiketler
     */
    public function label(): string
    {
        return match ($this) {
            self::STANDARD => 'Standart',
            self::PREMIUM => 'Premium',
        };
    }

    /**
     * Select / for dropdown
     */
    public static function options(): array
    {
        return array_map(
            fn ($case) => [
                'value' => $case->value,
                'label' => $case->label(),
            ],
            self::cases()
        );
    }

    /**
     * Livewire serileştirmesi için
     */
    public function toLivewire()
    {
        return $this->value;
    }

    /**
     * Livewire'dan geri dönüştürme için
     */
    public static function fromLivewire($value)
    {
        return self::from($value);
    }
}
