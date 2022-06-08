<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand_product';
}
