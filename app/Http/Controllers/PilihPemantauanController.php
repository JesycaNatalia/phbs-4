<?php

namespace App\Http\Controllers;

use App\Models\Ppemantauan;
use Illuminate\Http\Request;

class PilihPemantauanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $ppemantauan['ppemantauan'] = Ppemantauan::where('namapemantauan', 'like', '%' . $request->search . '%')->get();
        } else {
            $ppemantauan['ppemantauan'] = Ppemantauan::get();
        }


        return view('admin.dashboard.ppemantauan.index', $ppemantauan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.ppemantauan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ppemantauan::create([
            'namapemantauan' => $request->namapemantauan,
        ]);

        return redirect(route('admin.dashboard.pilihpemantauan.index'))->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppemantauan['ppemantauan'] = Ppemantauan::findOrFail($id);
        return view('admin.dashboard.ppemantauan.edit', $ppemantauan);
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
        $ppemantauan = Ppemantauan::findOrFail($id);
        $ppemantauan->update([
            'namapemantauan' => $request->namapemantauan,
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
        $ppemantauan = Ppemantauan::findOrFail($id);
        $ppemantauan->delete();

        return redirect()->back()->with("OK", "Bulan berhasil di hapus.");
    }
}
