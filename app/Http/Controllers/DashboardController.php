<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Ticket;
use App\Models\Company;
use App\Models\Product;
use App\Models\Service;
use App\Models\Ticketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $service = Service::all();
        $company = Company::where('cpny_type', '=', 3)->get();
        $product = Product::all();
        $level = Level::all();

        $countStatus = Ticket::select('ticket_status', DB::raw('count(*) as total'))
            ->groupBy('ticket_status')
            ->pluck('total', 'ticket_status');

        $countType = Ticket::select('service_id', DB::raw('count(*) as service_total'))
            ->groupBy('service_id')
            ->pluck('service_total', 'service_id');

        $labels = [
            1 => 'New',
            2 => 'In Progress',
            3 => 'Completed',
            4 => 'Close',
        ];

        $servicelabels = [
            1 => 'Software',
            2 => 'Hardware',
            3 => 'License',
            4 => 'Other',
        ];

        $counts = [];
        foreach ($labels as $key => $label) {
            $counts[$label] = $countStatus[$key] ?? 0;
        }

        $countsService = [];
        foreach ($servicelabels as $key => $servicelabels) {
            $countsService[$servicelabels] = $countType[$key] ?? 0;
        }

        return view('dashboard', compact('service', 'company', 'product', 'level', 'counts', 'countsService'));
    }
}
