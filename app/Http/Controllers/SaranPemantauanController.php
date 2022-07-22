<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranPemantauanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.dashboard.saran.create',  compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Saran::create([
            'kuisoner_id' => $request->kuisoner_id,
            'saran' => $request->saran,
        ]);

        return redirect()->back()->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saran_pemantauan['saran_pemantauans'] = Saran::where('kuisoner_id', $id)->get();
        return view('admin.dashboard.saran.index', $saran_pemantauan, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saran_pemantauan['saran_pemantauan'] = Saran::findOrFail($id);

        return view('admin.dashboard.saran.edit', $saran_pemantauan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $saran_pemantauan = Saran::findOrFail($id);
        $saran_pemantauan->update([
            'saran' => $request->saran,
        ]);

        return redirect()->back()->with("OK", "Berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $saran_pemantauan = Saran::findOrFail($id);
        $saran_pemantauan->delete();

        return redirect()->back()->with("OK", "Saran berhasil di hapus.");
    }
}
