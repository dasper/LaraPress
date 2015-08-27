<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TermRelationship extends Eloquent
{

    protected $table = 'term_relationships';
    protected $primaryKey = array('object_id', 'term_taxonomy_id');
    protected $fillable = array('option_value');

    public function parent()
    {
        return $this->belongsTo('LaraPress\Database\TermTaxonomy', 'parent');
    }

    public function post()
    {
        return $this->belongsTo('LaraPress\Database\Post', 'term_relationships', 'term_taxonomy_id', 'object_id');
    }

    public function term()
    {
        return $this->belongsTo('LaraPress\Database\Term', 'term_id');
    }

}
