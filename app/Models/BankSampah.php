<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;
    protected $table = 'banksampah';
    protected $primaryKey = 'id_banksampah';
    public $timestamps = false;

    protected $guarded = [
        'id_banksampah'
    ]; 
}
