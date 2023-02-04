<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name', 'slug', 'description', 'category_id', 'price', 'compare_price', 'cost',
        'quantity', 'availability', 'status', 'image', 'sku', 'barcode'
    ];
    public function scopeSearch(Builder $builder, $value)
    {
        if ($value) {
            $builder->where('products.name', 'LIKE', "%{$value}%");
        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
        return $this->belongsToMany(
            Tag::class,     // Related model
            'product_tag',  // Pivot table name
            'product_id',   // Current model FK in pivot table
            'tag_id',       // Related model FK in pivot table
            'id',           // Local (PK) current model
            'id'            // Local (PK) related model
        );
    }

    public function cartUsers()
    {
        return $this->belongsToMany(
            User::class,
            'carts',
            'product_id',
            'user_id',
            'id',
            'id'
        );
    }

    public static function availabilities()
    {
        return [
            'in-stock' => 'In Stock',
            'out-of-stock' => 'Out of Stock',
            'back-order' => 'Back-Order'
        ];
    }

    public static function statusOptions()
    {
        return [
            'active' => 'Active',
            'draft' => 'Draft',
            'archived' => 'Archived',
        ];
    }

    protected static function booted()
    {

        static::forceDeleted(function($product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        });

        static::saving(function($product) {
            $product->slug = Str::slug($product->name);
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

    public function getDiscountPercentAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return number_format(($this->compare_price - $this->price) / $this->compare_price * 100, 1);
    }

    public function getUrlAttribute()
    {
        return route('products.show', [$this->category->slug, $this->slug]);
    }
}
