<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_user extends Model
{
    use HasFactory;
    protected $table = 'data_user';
    protected $primaryKey = 'id_data_user';
    public $timestamps = false;

    protected $guarded = [
        'id_data_user'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
