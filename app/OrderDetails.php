<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'order_details_id';
    protected $table = 'tbl_order_details';
}
