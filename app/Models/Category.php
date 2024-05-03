<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_fr', 'slug'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class)->has('products');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * set search field to slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
