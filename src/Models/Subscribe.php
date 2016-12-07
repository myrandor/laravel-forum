<?php namespace Riari\Forum\Models;

use Illuminate\Support\Facades\Gate;
use Riari\Forum\Models\Post;
use Riari\Forum\Models\Traits\HasAuthor;
use Riari\Forum\Support\Traits\CachesData;
use DB;

class Subscribe extends BaseModel
{
    /**
     * Eloquent attributes
     */
    protected $table = 'forum_threads_subscription';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['thread_id', 'user_id'];

    /**
     * Create a new thread model instance.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function getIndex($thread_id, $user_id)
    {
        $item = DB::table('forum_threads_subscription')
			->whereThread_id($thread_id)
			->whereUser_id($user_id);

        return $item;
	}
}
