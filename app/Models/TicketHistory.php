<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = 'hd_ticketing_history';

    protected $fillable = [
        'ticket_no',
        'ticket_status',
        'created_at',
        'remarks'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_no', 'ticket_no');
    }
}
