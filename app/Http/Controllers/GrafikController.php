<?php

namespace App\Http\Controllers;

use App\Models\Ppemantauan;
use App\Models\ResponUser;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Kuisoner;

class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppemantauan['ppemantauan'] = Ppemantauan::get();
        return view('admin.dashboard.grafik.index', $ppemantauan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = KartuKeluarga::count();
        $kuisoner = Kuisoner::count();
        $all_respon_user['all_respon_users'] = ResponUser::with('bulan')->where('ppemantauan_id', $id)->get();
        return view('admin.dashboard.grafik.show', $all_respon_user, compact('user', 'kuisoner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
