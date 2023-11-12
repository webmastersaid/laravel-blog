<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = [];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCarbonDateAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
