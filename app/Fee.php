<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_fee';

    public function city(){
        return $this->belongsTo('App\City','fee_matp');
    }
    public function province(){
        return $this->belongsTo('App\Province','fee_maqh');
    }
}
