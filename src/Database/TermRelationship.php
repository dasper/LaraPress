<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TermRelationship extends Eloquent
{

    protected $table = 'term_relationships';
    protected $primaryKey = array('object_id', 'term_taxonomy_id');
    protected $fillable = array('option_value');

    public function post()
    {
        return $this->belongsTo('LaraPress\Database\Post', 'object_id');
    }

    public function taxonomy()
    {
        return $this->belongsTo('LaraPress\Database\TermTaxonomy', 'term_taxonomy_id');
    }

}
