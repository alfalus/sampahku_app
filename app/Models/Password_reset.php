<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
    // protected $primaryKey = 'id_order_jual';
    public $timestamps = false;

    // protected $guarded = [
    //     'id_order_jual'
    // ]; 
}
