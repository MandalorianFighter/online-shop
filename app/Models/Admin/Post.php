<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\PageSeo;


class Post extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, InteractsWithMedia, Translatable;
    use HasSlug;

    public $translatedAttributes = ['title', 'full_text'];

    protected $guarded = ['id'];
    protected $fillable = ['author', 'category_id'];
    
    protected $with = ['category'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
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
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function pageSeo()
    {
        return $this->morphOne(PageSeo::class, 'pageable');
    }

    public function translate(?string $locale = null, bool $withFallback = false): ?Model 
    { 
        return $this->getTranslation($locale, $withFallback); 
    } 

    public static function last()
    {
        return static::all()->last();
    }

        public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts')->useDisk('s3');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->height(200)
              ->width(200)
              ->quality(90)
              ->nonQueued();
    }

    public function attachImage($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
        ->usingFileName(time().'.'.$image->extension())
        ->toMediaCollection('posts');
        } else {
            return $this->addMedia(public_path('default/image-def.png'))
            ->preservingOriginal()
        ->toMediaCollection('posts');
        }        
    }

    public function updateImage($image)
    {
        $this->clearMediaCollection('posts');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('posts');        
    }

    public function scopeSearch($query, $searchTerm) 
    {
        if (!$searchTerm) {
            return $query;
        }

        $search = '%'.trim($searchTerm).'%';
        $query->where(function ($query) use ($search) {
            $query->where('title', 'like', $search)
            ->orWhereHas('blog_category.translations', function($query) use ($search) {
                $query->where('category_name', 'like', $search);
            });
        });
        
    }
}
