<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_no',
        'status',
        'created_at',
        'created_by',
        'remarks'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_no', 'ticket_no');
    }
}
