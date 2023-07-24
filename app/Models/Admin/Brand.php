<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $fillable = [
        'brand_name',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function last()
    {
        return static::all()->last();
    }

        public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brands');
    }

    public function attachLogo($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
        ->usingFileName(time().'.'.$image->extension())
        ->toMediaCollection('brands');
        } else {
            return $this->addMedia(public_path('default/image-def.png'))
            ->preservingOriginal()
        ->toMediaCollection('brands');
        }        
    }

    public function updateLogo($image)
    {
        $this->clearMediaCollection('brands');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('brands');        
    }
}
