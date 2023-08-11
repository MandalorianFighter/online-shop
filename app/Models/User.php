<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;
use App\Models\Admin\Order;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;
    use InteractsWithMedia;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'provider_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function pageSeo()
    {
        return $this->morphOne(PageSeo::class, 'pageable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->height(150)
              ->width(150)
              ->quality(90)
              ->nonQueued();

        $this->addMediaConversion('thumb-mid')
              ->performOnCollections('users/avatar')
              ->height(500)
              ->width(500)
              ->quality(90)
              ->nonQueued();
    }

    public function attachAvatar($image)
    {
        if(is_file($image)) {
            return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('users/avatar');
        } elseif (filter_var($image, FILTER_VALIDATE_URL)) {
            return $this->addMediaFromUrl($image)
            ->usingName(time())
            ->toMediaCollection('users/avatar');
        } else {
            return $this->addMedia(public_path('default/default-avatar.jpeg'))
            ->preservingOriginal()
            ->toMediaCollection('users/avatar');
        }        
    }

    public function updateAvatar($image)
    {
        $this->clearMediaCollection('users/avatar');
            
        return $this->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('users/avatar');        
    }
}
