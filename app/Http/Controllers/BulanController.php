<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use Illuminate\Http\Request;

class BulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan['bulans'] = Bulan::get();
        return view('admin.dashboard.bulan.index', $bulan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.bulan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bulan::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect(route('admin.dashboard.bulan.index'))->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bulan  $bulan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bulan['bulan'] = Bulan::findOrFail($id);
        return view('admin.dashboard.bulan.show', $bulan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bulan  $bulan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bulan['bulan'] = Bulan::findOrFail($id);
        return view('admin.dashboard.bulan.edit', $bulan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bulan  $bulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bulan = Bulan::findOrFail($id);
        $bulan->update([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect()->back()->with("OK", "Berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bulan  $bulan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bulan = Bulan::findOrFail($id);
        $bulan->delete();

        return redirect()->back()->with("OK", "Bulan berhasil di hapus.");
    }
}
