<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    const LIMIT = 16;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'name',
        'code',
        'quantity',
        'color',
        'size',
        'selling_price',
        'details',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'status',
    ];

    protected $with = ['category:id,category_name', 'subcategory:id,subcategory_name', 'brand:id,brand_name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getDiscount()
    {
        return intval(($this->selling_price - $this->discount_price) / $this->selling_price * 100);
    }

    public function limitName()
    {
        return Str::limit($this->name, Product::LIMIT);
    }

    public static function last()
    {
        return static::all()->last();
    }

        public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->height(150)
              ->width(150)
              ->quality(90)
              ->nonQueued();

        $this->addMediaConversion('thumb-mid')
              ->performOnCollections('products/imageOne')
              ->height(500)
              ->width(500)
              ->quality(90)
              ->nonQueued();
    }

    public function attachImgOne($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
        ->usingFileName(time().'.'.$image->extension())
        ->toMediaCollection('products/imageOne');
        } else {
            return $this->addMedia(public_path('default/image-def.png'))
            ->preservingOriginal()
        ->toMediaCollection('products');
        }        
    }

    public function attachImgTwo($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
        ->usingFileName(time().'.'.$image->extension())
        ->toMediaCollection('products/imageTwo');
        } else {
            return $this->addMedia(public_path('default/image-def.png'))
            ->preservingOriginal()
        ->toMediaCollection('products');
        }        
    }

    public function attachImgThree($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
        ->usingFileName(time().'.'.$image->extension())
        ->toMediaCollection('products/imageThree');
        } else {
            return $this->addMedia(public_path('default/image-def.png'))
            ->preservingOriginal()
        ->toMediaCollection('products');
        }        
    }

    public function updateImgOne($image)
    {
        $this->clearMediaCollection('products/imageOne');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('products/imageOne');        
    }

    public function updateImgTwo($image)
    {
        $this->clearMediaCollection('products/imageTwo');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('products/imageTwo');       
    }

    public function updateImgThree($image)
    {
        $this->clearMediaCollection('products/imageThree');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('products/imageThree');       
    }
}
