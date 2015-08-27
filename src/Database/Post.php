<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Post extends Eloquent
{

  function __construct()
  {
    # code...
  }

  const CREATED_AT = 'post_date';
  const UPDATED_AT = 'post_modified';
  protected $table = 'posts';
  protected $primaryKey = 'ID';
  protected $dates = ['post_date', 'post_date_gmt', 'post_modified', 'post_modified', 'post_modified_gmt'];
  protected $with = ['meta'];
  protected $attributes = [
        'post_status' => 'draft',
        'post_type' => 'post',
        'post_author' => '',
        'ping_status' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'to_ping' => '',
        'pinged' => '',
        'post_password' => '',
        'guid' => '',
        'post_content_filtered' => '',
        'post_excerpt' => '',
        'import_id' => 0,
        'post_content' => '',
        'post_title' => ''];

  /*
   *************************************************************************
   * RELATIONSHIPS
   *************************************************************************
  */
  /**
     * Meta data relationship
     *
     * @return Corcel\PostMetaCollection
     */
    public function meta()
    {
        return $this->hasMany('LaraPress\Database\PostMeta', 'post_id');
    }
    public function fields()
    {
        return $this->meta();
    }
    /**
     * Taxonomy relationship
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function taxonomies()
    {
        return $this->belongsToMany('LaraPress\Database\TermTaxonomy', 'term_relationships', 'object_id', 'term_taxonomy_id');
    }
    /**
     * Comments relationship
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
        return $this->hasMany('LaraPress\Database\Comment', 'comment_post_ID');
    }
    /**
    *   Author relationship
    *
    *   @return Illuminate\Database\Eloquent\Collection
    */
    public function author(){
        return $this->belongsTo('LaraPress\Database\User', 'post_author', 'ID');
    }
    /**
     * Get revisions from post
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function revision()
    {
        return $this->hasMany('LaraPress\Database\Post', 'post_parent')->where('post_type', 'revision');
    }
}
