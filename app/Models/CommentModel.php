<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CommentLikeModel;
use App\Models\ReplyCommentModel;

class CommentModel extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // CommentModel.php
public function likes()
{
    return $this->hasMany(CommentLikeModel::class, 'comment_id');
}

public function replies()
    {
        return $this->hasMany(ReplyCommentModel::class, 'comment_id');
    }


    protected $table = "comment";

    protected $fillable = [
        'product_id',
        'user_id',
        'comment'
    ];
    
}
