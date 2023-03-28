<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getCarbonAsDateAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
