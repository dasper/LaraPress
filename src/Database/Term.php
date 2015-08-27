<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Term extends Eloquent
{

    protected $table = 'terms';
    protected $primaryKey = 'term_id';

    public function getCategories()
    {
        $sql = "SELECT t.*, tt.* FROM wp_terms AS t INNER JOIN wp_term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy IN ('category') AND tt.count > 0 ORDER BY t.name ASC";
    }

    /**
     * Identify Unused Tags
     */
    public function unusedTags()
    {
        //$sql = "SELECT * From wp_terms wt INNER JOIN wp_term_taxonomy wtt ON wt.term_id=wtt.term_id WHERE wtt.taxonomy='post_tag' AND wtt.count=0;";
        $result = self::join('wp_term_taxonomy', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->where('wp_term_taxonomy.post_tag', '=', 'post_tag')
            ->where('wp_term_taxonomy.count', '=', 0)
            ->get();
        return $result;
    }

}
