<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarModel extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = 'kamar_id';
    protected $guarded = ['kamar_id'];
}
