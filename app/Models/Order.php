<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty', 'total', 'transaction_id', 'invoice_id',
        'paid', 'picked_date', 'shipped_date', 'delivered_date',
        'return_date', 'return_reason', 'user_id', 'product_id',
        'coupon_id '
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getPickedDateAttribute($value)
    {
        if ($value !== null) {
            return Carbon::parse($value)->diffForHumans();
        }

        return null;
    }

    public function getShippedDateAttribute($value)
    {
        if ($value !== null) {
            return Carbon::parse($value)->diffForHumans();
        }

        return null;
    }

    public function getDeliveredDateAttribute($value)
    {
        if ($value !== null) {
            return Carbon::parse($value)->diffForHumans();
        }

        return null;
    }


}
