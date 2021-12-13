<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akses_token extends Model
{
    use HasFactory;
    protected $table = 'akses_token';
    protected $primaryKey = 'id_session';
    public $timestamps = false;

    protected $guarded = [
        'id_session'
    ]; 
}
