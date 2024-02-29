<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLikeModel extends Model
{
    use HasFactory;

    protected $table = 'commentlike';
    protected $fillable = ['comment_id', 'user_id', 'product_id'];
}
