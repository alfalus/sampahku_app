<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage_jual_sampah extends Model
{
    use HasFactory;
    protected $table = 'storage_jual_sampah';
    protected $primaryKey = 'id_storage';
    public $timestamps = false;

    protected $guarded = [
        'id_storage'
    ];
}
