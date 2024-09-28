<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'post_id',
        'banner',
        'title',
        'subtitle',
        'pages',
        'publisher',
        'amazon_link',
        'baernes_noble_link'
    ];
}
