<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satpel extends Model
{
    use HasFactory;
    protected $table = 'satpel';
    protected $primaryKey = 'id_satpel';
    public $timestamps = false;

    protected $guarded = [
        'id_satpel'
    ];
}
