<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'content',
        'author_name',
        'status',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function formattedDate()
    {
        $format = 'F jS, Y';

        return ($this->published_at)->format($format);
    }

    /**
     * @return string
     */
    public function readTime()
    {
        $words = str_word_count($this->content);
        $minutes = ceil($words / 200);

        return $minutes . ' min read';
    }
}
