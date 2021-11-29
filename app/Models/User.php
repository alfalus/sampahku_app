<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    
    protected $guarded = [
        'id'
    ];
    // DB::table("users")->insert(["name" => "aldo", "email" => "aldo@gmail.com", "password" => "$2y$10$ViBgi.bXJZx4fxlV/SUZs.2jm9MuaCKlZKZ2kS4araNlm/GY8u8XO","create"])
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function data_user()
    {
        return $this->hasOne(Data_user::class, 'foreign_key','local_key');
    }
}
