<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'book_id',
        'reviewer',
        'review_type',
        'review_title',
        'review',
    ];

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }

    public function reviewer()
{
    return $this->belongsTo(Reviewer::class, 'reviewer'); // The second parameter is the foreign key
}





}
