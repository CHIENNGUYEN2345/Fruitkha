<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'matp';
    protected $table = 'tbl_tinhthanhpho';
}
