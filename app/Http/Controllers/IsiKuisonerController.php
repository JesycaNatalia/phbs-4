<?php

namespace App\Http\Controllers;

use App\Models\IsiKuisoner;
use Illuminate\Http\Request;

class IsiKuisonerController extends Controller
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
        return view('admin.dashboard.jawaban.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IsiKuisoner::create([
            'kuisoner_id' => $request->kuisoner_id,
            'jawaban' => $request->jawaban,
            'skor' => $request->skor,
        ]);

        return redirect()->back()->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IsiKuisoner  $isiKuisoner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // create jawaban sesuai id kuisoner
        $isi_kuisoner['isi_kuisoners'] = IsiKuisoner::where('kuisoner_id', $id)->get();
        return view('admin.dashboard.jawaban.index', $isi_kuisoner, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IsiKuisoner  $isiKuisoner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isi_kuisoner['isi_kuisoner'] = IsiKuisoner::findOrFail($id);
        return view('admin.dashboard.jawaban.edit', $isi_kuisoner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IsiKuisoner  $isiKuisoner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isi_kuisoner = IsiKuisoner::findOrFail($id);
        $isi_kuisoner->update([
            'jawaban' => $request->jawaban,
            'skor' => $request->skor,
        ]);

        return redirect()->back()->with("OK", "Berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IsiKuisoner  $isiKuisoner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuisoner = IsiKuisoner::findOrFail($id);
        $kuisoner->delete();

        return redirect()->back()->with("OK", "Jawaban berhasil di hapus.");
    }
}
