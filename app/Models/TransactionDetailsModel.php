<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'transactiondetails';

    protected $fillable = [
        'transaction_id',
        'alamat',
        'no_telp',
        'email',
    ];
}
