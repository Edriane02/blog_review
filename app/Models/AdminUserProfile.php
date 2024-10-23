<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserProfile extends Model
{
    use HasFactory;

    protected $table = 'admin_user_profiles';
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'user_type_id'
    ];

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class, 'user_id', 'user_id'); 
    }

    public function designationType()
    {
        return $this->belongsTo(Designation::class, 'user_type_id', 'id');
    }
}
