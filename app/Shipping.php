<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping';
}
