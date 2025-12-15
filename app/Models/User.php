<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'business_name',
        'phone',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];


    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class, 'customer_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function sellerOrders(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'seller_id');
    }

    public function passwordResets(): HasMany
    {
        return $this->hasMany(PasswordReset::class);
    }

    // Helper methods for role checking
    public function isAdmin(): bool
    {
        return $this->role_id === 1; // Assuming admin role_id is 1
    }

    public function isSeller(): bool
    {
        return $this->role_id === 2; // Assuming seller role_id is 2
    }

    public function isCustomer(): bool
    {
        return $this->role_id === 3; // Assuming customer role_id is 3
    }
}
