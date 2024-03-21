<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class KritikdansaranModel extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $table='kritikdansaran';
    protected $fillable=[
        'user_id','nama','kritik','saran',
    ];
}
