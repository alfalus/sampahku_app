<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_jual extends Model
{
    use HasFactory;
    protected $table = 'order_jual';
    protected $primaryKey = 'id_order_jual';
    public $timestamps = false;

    protected $guarded = [
        'id_order_jual'
    ]; 
}
