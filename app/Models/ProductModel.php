<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductLikeModel;

class ProductModel extends Model
{
    use HasFactory;

    public function likes() {
        return $this->hasMany(ProductLikeModel::class, 'productId');
    }
    protected $table = 'product';

    protected $fillable = [
    'product_name',
    'product_image',
    'desc',
    'stock',
    'harga',
    'kategori',
    ];
}
