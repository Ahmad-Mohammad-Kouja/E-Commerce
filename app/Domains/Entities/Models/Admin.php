<?php

namespace App\Domains\Entities\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

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
