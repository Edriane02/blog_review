<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedAuthor extends Model
{
    use HasFactory;

    protected $table = 'featured_author';

    protected $fillable = [
        'author_name',
        'img_banner',
        'headline',
        'body_text',
        'status',
    ];
}
