<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'discount', 'validity'
    ];

    public function checkIfValid()
    {
        $from = Carbon::parse()->now();
        $to = Carbon::parse($this->validity);
        if($from > $to) {
            return false;
        } else {
            return true;
        }
    }
}
