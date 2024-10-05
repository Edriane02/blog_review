<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'banner',
        'title',
        'subtitle',
        'genre',
        'pages',
        'publisher',
        'amazon_link',
        'barnes_noble_link'
    ];

    public function bookTag()
    {
        return $this->hasMany(BookTag::class, 'book_id');
    }

    public function reviews() // Change this method to 'reviews'
    {
        return $this->hasMany(Reviews::class, 'book_id'); // Ensure the method name matches the relationship
    }
}
