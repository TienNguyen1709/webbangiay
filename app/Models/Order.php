<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id', 'shipping_id', 'order_status', 'order_code', 'order_date', 'order_cancel', 'created_at'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';

}
