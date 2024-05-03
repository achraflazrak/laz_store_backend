<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $fillable = [
        'name_en', 'name_fr', 'slug', 'category_id',
        'subcategory_id', 'qty', 'tag_en', 'tag_fr',
        'size_en', 'size_fr', 'color_en', 'color_fr',
        'selling_price', 'old_price', 'desc_en', 'desc_fr',
        'product_thumbnail', 'product_image_1', 'product_image_2',
        'product_image_3', 'new', 'featured', 'best_seller',
        'hot_deal', 'status'
    ];

    protected $appends = [
        'thumbnail', 'first_image', 'second_image', 'third_image',
        'product_reviews_avg_rating'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class)->with('user')
            ->where('approved', 1)->latest();
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function getThumbnailAttribute() {
        return asset('storage/images/products/' . $this->product_thumbnail);
    }

    public function getFirstImageAttribute(){
        if ($this->product_image_1) {
            return asset('storage/images/products/' . $this->product_image_1);
        }
        return null;
    }

    public function getSecondImageAttribute() {
        if ($this->product_image_2) {
            return asset('storage/images/products/' . $this->product_image_2);
        }
        return null;
    }

    public function getThirdImageAttribute() {
        if ($this->product_image_3) {
            return asset('storage/images/products/' . $this->product_image_3);
        }
        return null;
    }

    public function getProductReviewsAvgRatingAttribute() {
        return $this->reviews()->count() ? (int) $this->reviews()->avg('rating') : 0;
    }

}
