<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_user extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_data_user';

    protected $guarded = [
        'id_data_user'
    ];
}
