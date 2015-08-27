<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PostMeta extends Eloquent {

    protected $table = 'postmeta';
    protected $primaryKey = 'meta_id';
    public $timestamps = false;
    protected $fillable = array('meta_key', 'meta_value', 'post_id');

    public function post()
    {
        return $this->belongsTo('LaraPress\Database\Post', 'post_id', 'post.id');
    }

}
