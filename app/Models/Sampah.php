<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampah';
    protected $primaryKey = 'id_item';
    public $timestamps = false;

    protected $guarded = [
        'id_item'
    ];
}
