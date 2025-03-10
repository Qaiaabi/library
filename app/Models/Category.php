<?php
// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Pastikan nama tabel sesuai

    public function books()
    {
        return $this->hasMany(books::class, 'category_id');
    }
}
