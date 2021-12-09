<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurangan_item extends Model
{
    use HasFactory;
    protected $table = 'pengurangan_item';
    protected $primaryKey = 'id_pengurangan';
    public $timestamps = false;

    protected $guarded = [
        'id_pengurangan'
    ];
}
