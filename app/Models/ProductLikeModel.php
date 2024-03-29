<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class ProductLikeModel extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    protected $table = "productlikes";

    protected $fillable = [
        'productId',
        'userId',
        'total_likes',
    ];

    
}
