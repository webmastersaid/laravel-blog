<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $guarded = [];

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function likedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user_likes');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function parseDate()
    {
        $date = Carbon::parse($this->created_at);
        $date = $date->translatedFormat('F') . ' ' . $date->day . ', ' . $date->year . ' ' . $date->format('H:i');
        return $date;
    }
}
