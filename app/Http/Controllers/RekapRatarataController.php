<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResponUser;
use App\Models\Bulan;
use App\Models\Ppemantauan;

class RekapRatarataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulans = Bulan::get();
        $ppemantauans = Ppemantauan::get();
        foreach($bulans as $bulan){
            $all_respon_users = ResponUser::with('bulan', 'ppemantauan')->where('bulan_id', $bulan->id)->get();       
            foreach($ppemantauans as $key=>$pemantauan){
                foreach($all_respon_users as $all_respon_user){
                    if($all_respon_user->ppemantauan_id == $pemantauan->id){
                        $rekap_pemantauan[$key]['hitung'] = 0;
                        foreach($all_respon_users as $all_respon_user){
                            $rekap_pemantauan[$key]['hitung'] = $rekap_pemantauan[$key]['hitung'] + $all_respon_user->total_skor;
                        }
                        $rekap_pemantauan[$key]['rata_rata'] = $all_respon_users->count() == 0 ? 0 : $rekap_pemantauan[$key]['hitung'] / $all_respon_users->count();
                        $rekap_pemantauan[$key]['pemantauan'] = $pemantauan->namapemantauan;
                        $rekap_pemantauan[$key]['bulan'] = $bulan->bulan;
                        $rekap_pemantauan[$key]['tahun'] = $bulan->tahun;
                    }
                }
            }
        }
        return view('admin.dashboard.rekapratarata.index', compact('rekap_pemantauan'));
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
