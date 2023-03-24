<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoryTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['subcategory_name'];
}
