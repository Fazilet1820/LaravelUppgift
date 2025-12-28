<?php

namespace App\Enums;

use Livewire\Wireable;

enum CustomerKind: string implements Wireable
{
    case INDIVIDUAL = 'individual';
    case COMPANY = 'company';
    case GOVERNMENT = 'government';

    /**
     * İnsan okunabilir etiketler
     */
    public function label(): string
    {
        return match ($this) {
            self::INDIVIDUAL => 'Individual',
            self::COMPANY => 'Company',
            self::GOVERNMENT => 'Government',
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
