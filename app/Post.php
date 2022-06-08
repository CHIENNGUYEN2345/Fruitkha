<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'post_id';
    protected $table = 'tbl_posts';

    public function cate_post(){
        return $this->belongsTo('App\CatePost','cate_post_id');
    }
}
