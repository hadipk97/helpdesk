<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'dt_campany';

    protected $fillable = [
        'cpny_name',
        'cpny_addr',
        'cpny_country',
        'cpny_state',
        'cpny_phone_no',
        'cpny_fax',
        'cpny_email',
        'cpny_url',
        'cpny_contact_person',
        'cpny_contact_no',
        'cpny_type',
        'cpny_stat',
        'cpny_pic'
    ];
}
