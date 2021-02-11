<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::get();
        return view('content.penjualan', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.formpenjualan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'berat' => 'required|numeric',
            'harga' => 'required|integer',
        ];

        $messages = [
            'berat.required' => 'Berat harus diisi',
            'berat.numeric' => 'Berat harus berupa angka',
            'harga.required' => 'Harga harus diisi',
            'harga.integer' => 'Harga harus berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $income = new Income;
        $income->berat = $request->berat;
        $income->harga = $request->harga;
        $simpan = $income->save();

        if ($simpan) {
            Session::flash('success', 'Input Berhasil');
            return redirect()->route('penjualan');
        } else {
            Session::flash('error', 'Input Gagal');
            return redirect()->route('input-penjualan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('content.editpenjualan', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $rules = [
            'berat' => 'required|numeric',
            'harga' => 'required|integer',
        ];

        $messages = [
            'berat.required' => 'Berat harus diisi',
            'berat.numeric' => 'Berat harus berupa angka',
            'harga.required' => 'Harga harus diisi',
            'harga.integer' => 'Harga harus berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $income = Income::find($income->id);
        $income->berat = $request->berat;
        $income->harga = $request->harga;
        $simpan = $income->save();

        if ($simpan) {
            Session::flash('success', 'Input Berhasil');
            return redirect()->route('penjualan');
        } else {
            Session::flash('error', 'Input Gagal');
            return redirect()->route('input-penjualan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('penjualan')->with('success', 'Data telah terhapus');
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
            ->get();


        return view('content.penjualan', compact('incomes'));
    }
}
