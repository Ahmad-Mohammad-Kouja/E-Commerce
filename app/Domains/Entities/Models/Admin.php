<?php

namespace App\Domains\Entities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
        'status',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function findByEmail(string $email): ?Admin
    {
        return self::query()
            ->where('email', $email)
            ->first();
    }
}
