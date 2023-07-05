<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_one',
        'phone_two',
        'company_email',
        'company_name',
        'company_address',
        'fb',
        'youtube',
        'instagram',
        'twitter',
    ];
}
