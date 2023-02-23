<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_eng',
        'category_name_ukr',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
