<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'old_price',
        'image', 'badge', 'size', 'life',
    ];

public function getImageUrlAttribute(): string
{
    if (!$this->image) {
        return asset('images/placeholder.png');
    }
    return asset($this->image);
}
}