<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $table = 'errors';
    protected $fillable = ['name', 'image', 'level1', 'level2', 'level3']; // Các trường có thể gán dữ liệu vào
}
