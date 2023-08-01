<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Donhangchitiet extends Model
{
    use HasFactory;
    protected $fillable=['iddon', 'idsanpham', 'soluong', 'price', 'image'];
    public function SanPham(): HasOne{
        return $this->hasOne(san_pham::class, 'id', 'idsanpham');
    }
}
