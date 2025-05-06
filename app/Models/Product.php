<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'lt_product';

    // public function ticket()
    // {
    //     return $this->hasOne(Ticket::class);
    // }
}
