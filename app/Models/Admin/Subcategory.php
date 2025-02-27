<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\PageSeo;

class Subcategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    use HasSlug;

    public $translatedAttributes = ['subcategory_name'];

    protected $fillable = ['category_id'];

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
     * Get the category that owns the subcategory.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

        return $query->where(function ($query) use ($search) {
            $query->whereTranslationLike('subcategory_name', '%'.trim($search).'%')
                ->orWhereHas('category.translations', function($query) use ($search) {
                    $query->where('category_name', 'like', '%'.trim($search).'%');
                });
        });
    }
}