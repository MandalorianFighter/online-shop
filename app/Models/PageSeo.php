<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    use HasFactory;

    protected $table = 'page_seos';

    protected $fillable = [
        'page_url',
        'page_title',
        'meta_author',
        'meta_description',
        'meta_keywords',
        'google_analytics',
        'bing_analytics',
        ];
    
    public function pageable()
    {
        return $this->morphTo();
    }
}
