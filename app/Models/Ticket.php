<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cookie;

class Ticket extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'hd_ticketing';

    protected $casts = [
        'created_date' => 'datetime',
    ];

    protected $fillable = [
        'ticket_no',
        'requester',
        'client_id',
        'ticket_subject',
        'product_id',
        'product_type',
        'ticket_desc',
        'service_id',
        'level_id',
        'ticket_status',
        'created_by',
        'created_date',
        'updated_at',
        'deleted_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'client_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class, 'ticket_no', 'ticket_no');
    }

    public function sortedHistories($direction = 'asc')
    {
        return $this->histories()->orderBy('created_at', $direction);
    }

    public static function get_last_id()
    {
        $year = Carbon::now()->format('Y');

        $count = DB::connection('mysql')
            ->table('dt_task')
            ->where('task_date', 'like', $year . '%')
            ->count();

        $userid = Session::get('id');

        $taskNo = 'T/' . date('y/m') . '/' . $userid . '-' . str_pad(($count + 1), 3, '0', STR_PAD_LEFT);

        return [
            'count' => $count,
            'task_no' => $taskNo
        ];
    }

    public static function get_service_type()
    {
        $servTypes = DB::connection('mysql')
            ->table('lt_serv_type')
            ->where('serv_stat', 1)
            ->orderBy('serv_desc', 'ASC')
            ->pluck('serv_desc', 'id')
            ->toArray();

        return $servTypes;
    }
}
