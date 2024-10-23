<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUserProfile extends Model
{
    use HasFactory;

    protected $table = 'client_user_profiles';
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'suffix',
    ];

    public function clientUser()
    {
        return $this->belongsTo(ClientUser::class, 'user_id', 'user_id'); 
    }

}
