<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Outcome;
use Illuminate\Support\Facades\DB;

class ProfitController extends Controller
{
    public function index()
    {
        $incomes = DB::table('incomes')->get()->sum('harga');
        $outcomes = DB::table('outcomes')->get()->sum('harga');
        $profit_this_month = $incomes - $outcomes;

        return view('content.keuntungan', compact('incomes', 'outcomes', 'profit_this_month'));
    }
    public function filter(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');

        if ($month == 0) {
            $month = Carbon::now()->format('m');
        }
        if ($year == 0) {
            $year = Carbon::now()->format('Y');
        }

        $incomes = Income::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()->sum('harga');
        $outcomes = Outcome::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()->sum('harga');


        return view('content.keuntungan', compact('incomes'), compact('outcomes'));
    }
}
