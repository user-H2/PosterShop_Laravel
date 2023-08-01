<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    use HasFactory;
    protected $table = 'san_pham';
    protected $fillable = ['name', 'id_loai_sp', 'id_ncc', 'mota_sp', 'unit_price', 'gia_km', 'so_luong', 'image', 'size'];
}
