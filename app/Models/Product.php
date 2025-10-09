<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Products';       // Tên bảng viết hoa
    protected $primaryKey = 'ID';        // Khóa chính là ID
    public $timestamps = false;          // Không có created_at / updated_at

    protected $fillable = [
        'ID',
        'Name',
        'Description',
        'Price',
        'Sale',
        'Image',
        'Latest',
        'Tags',
        'Status'
    ];
}
