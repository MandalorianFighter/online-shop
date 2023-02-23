<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'post_title_eng',
        'post_title_ukr',
        'category_id',
        'details_eng',
        'details_ukr',
    ];

    protected $with = ['category:id,category_name_eng,category_name_ukr'];

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public static function last()
    {
        return static::all()->last();
    }

        public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->height(200)
              ->sharpen(10)
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
}
