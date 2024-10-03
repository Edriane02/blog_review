<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    use HasFactory;
    protected $table = 'book_tag';
    protected $fillable = [
        'book_id',
        'book_tag',
    ];

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
