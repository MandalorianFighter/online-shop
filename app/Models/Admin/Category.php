<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\PageSeo;

class Category extends Model implements TranslatableContract, HasMedia
{
    use HasFactory, Translatable;
    use InteractsWithMedia;
    use HasSlug;

    public $translatedAttributes = ['category_name'];

    protected $guarded = ['id'];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('category_name')
            ->saveSlugsTo('slug')
            ->usingSeparator('-')
            ->preventOverwrite();
    }

    public function regenerateSlug()
    {
        $this->generateSlug();
        $this->save();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the subcategories for the category.
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function pageSeo()
    {
        return $this->morphOne(PageSeo::class, 'pageable');
    }

    public function translate(?string $locale = null, bool $withFallback = false): ?Model 
    { 
        return $this->getTranslation($locale, $withFallback); 
    } 

    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }
        
        return $query->whereTranslation('category_name', 'like', '%' . trim($search) . '%');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories');
    }

    public function attachLogo($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
        ->usingFileName(time().'.'.$image->extension())
        ->toMediaCollection('categories');
        } else {
            return $this->addMedia(public_path('default/image-def.png'))
            ->preservingOriginal()
        ->toMediaCollection('categories');
        }        
    }

    public function updateLogo($image)
    {
        $this->clearMediaCollection('categories');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('categories');        
    }
}
