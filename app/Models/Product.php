<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "description",
        "price",
        "category_id",
        "new",
        "popular"
    ];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
