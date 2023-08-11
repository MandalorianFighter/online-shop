<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AdminFactory extends Factory
{
    protected $model = Admin::class;

    
    public function definition()
    {
        $now = date('Y-m-d H:i:s');
        return [
            'name' => 'Admin',
            'phone' => '+380954841127',
            'email' => 'admin@gmail.com',
            'email_verified_at' => $now,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'category' => 1,
            'coupon' => 1,
            'product' => 1,
            'blog' => 1,
            'orders' => 1,
            'other' => 1,
            'report' => 1,
            'role' => 1,
            'return_orders' => 1,
            'contact' => 1,
            'comment' => 1,
            'setting' => 1,
            'stock' => 1,
            'type' => 1,
        ];
    }
}
