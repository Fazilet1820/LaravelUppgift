<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\MembershipType;
use App\Enums\CustomerKind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory; //It is a trait that allows generating fake data for testing and seeding purposes for Eloquent models. In short: it is used so that Model::factory() works.

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'membership_type',
        'is_active',
        'customer_kind'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'is_active' => 'boolean',
        'membership_type' => MembershipType::class,
        'customer_kind' => CustomerKind::class,
    ];
}
