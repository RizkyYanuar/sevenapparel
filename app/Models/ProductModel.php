<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductLikeModel;
use App\Models\TransactionModel;

class ProductModel extends Model
{
    use HasFactory;

    public function likes() {
        return $this->hasMany(ProductLikeModel::class, 'productId');
    }

    public function sold() {
        return $this->hasMany(TransactionModel::class, 'product_id');
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
