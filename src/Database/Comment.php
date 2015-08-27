<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{

    protected $table = 'comments';

    public function post()
    {
        return $this->belongsTo('Post');
    }

    /**
     * Batch Deleting Spam Comments
     */
    public function deleteSpamComments()
    {
        //$sql = "DELETE FROM wp_comments WHERE wp_comments.comment_approved = 'spam'";
        return self::where('comment_approved', '=', 'spam')->delete();
    }

    /*
     * Delete Comments With A Specific URL
     */
    public function deleteByUrl($url)
    {
        //$sql = "DELETE from wp_comments WHERE comment_author_url LIKE '%nastyspamurl%'";
        self::where('comment_author_url', 'LIKE', "%$url%")
            ->delete();
    }

}
