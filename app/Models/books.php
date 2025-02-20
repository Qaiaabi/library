<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    // app/Models/books.php

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
