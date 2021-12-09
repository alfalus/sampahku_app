<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_beli extends Model
{
    use HasFactory;
    protected $table = 'order_beli';
    protected $primaryKey = 'id_order_beli';
    public $timestamps = false;

    protected $guarded = [
        'id_order_beli'
    ]; 
}
