<?php

namespace App\Models\Admin;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, InteractsWithMedia, Translatable;

    const LIMIT = 16;
    const DET_LIMIT = 500;

    public $translatedAttributes = ['product_name', 'product_details', 'color'];

    protected $guarded = ['id'];

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'code',
        'quantity',
        'size',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'buyone_getone',
        'trend',
        'status',
    ];

    protected $with = ['category', 'subcategory', 'brand:id,brand_name'];

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

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function translate(?string $locale = null, bool $withFallback = false): ?Model 
    { 
        return $this->getTranslation($locale, $withFallback); 
    } 

    public function getDiscount()
    {
        return intval(($this->selling_price - $this->discount_price) / $this->selling_price * 100);
    }

    public function limitName()
    {
        return Str::limit($this->product_name, Product::LIMIT);
    }

    public function limitDetails()
    {
        return Str::limit($this->product_details, Product::DET_LIMIT);
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
