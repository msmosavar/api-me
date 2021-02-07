<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $defaultUsers = [
        [
            'email' => 'admin@site.com',
            'password' => 'admin',
            'name' => 'Admin',
            'role' => Role::ROLE_SUPER_ADMIN
        ],
        [
            'email' => 'teacher@site.com',
            'password' => '12345678',
            'name' => 'Teacher',
            'role' => Role::ROLE_TEACHER
        ],
        [
            'email' => 'student@site.com',
            'password' => 'student',
            'name' => 'Student',
            'role' => Role::ROLE_STUDENT
        ]
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail());
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'user_id');
    }
}
