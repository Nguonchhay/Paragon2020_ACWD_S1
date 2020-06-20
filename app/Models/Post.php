<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *      definition="Post",
 *      required={"title", "category_id", "creator_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="category_id",
 *          description="category_id",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="author",
 *          description="author",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="content",
 *          description="content",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="creator_id",
 *          description="creator_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Post extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'title', 'category_id', 'author', 'content', 'creator_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
