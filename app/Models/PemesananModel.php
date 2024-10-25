<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananModel extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'pemesanan_id';
    protected $guarded = ['pemesanan_id'];

    public function getuser()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }
    public function getkamar()
    {
        return $this->belongsTo(KamarModel::class, 'kamar', 'kamar_id');
    }
}
