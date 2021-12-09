<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan_saldo extends Model
{
    use HasFactory;
    protected $table = 'penarikan_saldo';
    protected $primaryKey = 'id_penarikan';
    public $timestamps = false;

    protected $guarded = [
        'id_penarikan'
    ];
}
