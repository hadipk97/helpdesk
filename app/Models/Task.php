<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = 'dt_task';

    protected $fillable = [
        'id',
        'task_id',
        'task_name',
        'task_date',
        'task_date_end',
        'task_time',
        'task_desc',
        'task_level',
        'task_assign',
        'assign_by',
        'task_stat',
        'task_client',
        'task_client_pic',
        'task_product',
        'task_type',
    ];
}
