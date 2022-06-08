<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatePost extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'cate_post_id';
    protected $table = 'tbl_category_post';
}
