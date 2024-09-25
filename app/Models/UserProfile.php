<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'user_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id'); 
    }

    public function designationType()
    {
        return $this->belongsTo(Designation::class, 'user_type_id', 'id');
    }
}
