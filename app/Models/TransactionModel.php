<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionDetailsModel;

class TransactionModel extends Model
{
    use HasFactory;

    public function detail() {
        return $this->hasOne(TransactionDetailsModel::class, 'transaction_id');
    }

    public function product() {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }


    protected $table = 'transaction';

    protected $fillable = [
        'product_id',
        'user_id',
        'harga',
        'status',
        'snap_token',
    ];
}
