<?php

namespace App\Http\Controllers;

use App\Models\Kuisoner;
use Illuminate\Http\Request;


class KuisonerController extends Controller
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
        return view('admin.dashboard.kuisoner.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kuisoner::create([
            'ppemantauan_id' => $request->ppemantauan_id,
            'pertanyaan' => $request->pertanyaan,
            'penjelasan' => $request->penjelasan ?? ''
        ]);

        return redirect()->back()->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kuisoner['kuisoners'] = Kuisoner::where('ppemantauan_id', $id)->get();
        return view('admin.dashboard.kuisoner.index', $kuisoner, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kuisoner['kuisoner'] = Kuisoner::findOrFail($id);

        return view('admin.dashboard.kuisoner.edit', $kuisoner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kuisoner = Kuisoner::findOrFail($id);
        $kuisoner->update([
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->back()->with("OK", "Berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuisoner = Kuisoner::findOrFail($id);
        $kuisoner->delete();

        return redirect()->back()->with("OK", "Kuisoner berhasil di hapus.");
    }
}
