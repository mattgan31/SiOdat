<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutcomeStoreRequest;
use App\Http\Requests\OutcomeUpdateRequest;
use Illuminate\Support\Carbon;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $outcomes = Outcome::get();
        return view('content.pengeluaran', compact('outcomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.formpengeluaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutcomeStoreRequest $request)
    {
        $outcome = new Outcome;
        $outcome->jumlahAyam = $request->jumlahAyam;
        $outcome->harga = $request->harga;
        $simpan = $outcome->save();

        if (!$simpan) {
            return redirect()->route('input-penjualan')->with('warning', 'Data gagal ditambahkan!');
        }

        return redirect()->route('penjualan')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Outcome $outcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Outcome $outcome)
    {
        $outcomes = Outcome::get()->where('id', $outcome->id);
        return view('content.editpengeluaran', compact('outcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(OutcomeUpdateRequest $request, Outcome $outcome)
    {
        $outcome = Outcome::find($outcome->id);
        $outcome->jumlahAyam = $request->jumlahAyam;
        $outcome->harga = $request->harga;
        $simpan = $outcome->save();

        if (!$simpan) {
            return redirect()->route('pengeluaran')->with('warning', 'Data gagal diubah!');
        }

        return redirect()->route('pengeluaran')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outcome $outcome)
    {
        $outcome->delete();
        return redirect()->route('pengeluaran')->with('success', 'Data berhasil terhapus');
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
        $outcomes = Outcome::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();


        return view('content.pengeluaran', compact('outcomes'));
    }
}
