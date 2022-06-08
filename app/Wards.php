<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
