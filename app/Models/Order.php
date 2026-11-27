<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_number', 'customer_name', 'phone', 'email', 'address', 'city', 'postal_code',
        'shipping_method', 'shipping_cost', 'delivery_date', 'delivery_time', 'notes',
        'total', 'status', 'payment_status', 'payment_method', 'tracking_number',
        'midtrans_order_id', 'midtrans_snap_token',
    ];

    protected function casts(): array
    {
        return [
            'total' => 'integer',
            'shipping_cost' => 'integer',
            'delivery_date' => 'date',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function generateOrderNumber(): string
    {
        return 'FLW-'.now()->format('ymd').'-'.strtoupper(substr(uniqid(), -5));
    }
}
