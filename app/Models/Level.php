<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_name',
        'level_desc',
        'level_duration',
        'level_respond',
        'isActive',
        'created_at',
        'created_by',
        'updated_at',
        'deleted_date'
    ];
}
