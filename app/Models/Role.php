<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = 'lt_role';
    protected $fillable = [
        'role',
        'role_desc',
        'role_stat'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role', 'id');
    }
}
