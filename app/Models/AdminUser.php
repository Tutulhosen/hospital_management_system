<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminUser extends User
{
    use HasFactory;
    protected $guarded=[];

    /**
     * got data from role table
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
