<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = 'hd_service';

    protected $fillable = [
        'service_name',
        'service_desc',
        'service_duration',
        'service_respond',
        'isActive',
        'created_by',
        'created_date',
        'updated_at',
        'deleted_date'
    ];
}
