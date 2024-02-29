<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ReplyCommentModel extends Model
{

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    use HasFactory;

    protected $table = 'replycomment';

    protected $fillable = [
        'product_id',
        'comment_id',
        'user_id',
        'comment'
    ];
}
