<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $guarded = ['order_id'];

    public function getuser()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }
    public function getkamar()
    {
        return $this->belongsTo(KamarModel::class, 'kamar', 'kamar_id');
    }
}
