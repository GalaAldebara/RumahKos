<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghuniModel extends Model
{
    use HasFactory;

    protected $table = 'penghuni';
    protected $primaryKey = 'penghuni_id';
    protected $guarded = ['penghuni_id'];

    public function getuser()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }
    public function getkamar()
    {
        return $this->belongsTo(KamarModel::class, 'kamar', 'kamar_id');
    }
}
