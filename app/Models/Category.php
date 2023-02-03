<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['name', 'slug', 'parent_id', 'description', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
        return $this->hasMany(Product::class);
    }

    public function scopeSearch(Builder $builder, $value)
    {
        if ($value) {
            $builder->where('categories.name', 'LIKE', "%{$value}%");
        }
    }

    protected static function booted()
    {

        static::forceDeleted(function($category) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
        });

        static::saving(function($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/mealfoodpng.png');
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return Storage::disk('public')->url($this->image);
    }
}
