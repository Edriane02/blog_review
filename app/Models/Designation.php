<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table = 'des_types';
    protected $fillable = [
        'designation',
    ];
    
    public function user()
    {
        return $this->belongsTo(AdminUserProfile::class, 'user_id', 'id');
    }
}
