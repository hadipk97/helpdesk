<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    use HasFactory;
    protected $table = 'login_view';

    public $incrementing = false;
    public $timestamps = false;
}
