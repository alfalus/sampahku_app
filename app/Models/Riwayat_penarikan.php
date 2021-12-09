<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_penarikan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_penarikan';
    protected $primaryKey = 'id_penarikan_user';
    public $timestamps = false;

    protected $guarded = [
        'id_penarikan_user'
    ];
}
