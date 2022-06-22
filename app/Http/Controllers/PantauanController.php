<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResponUser;
use App\Models\User;
use App\Models\JawabanUser;
use App\Models\KartuKeluarga;
use App\Models\Kuisoner;
use App\Models\StatusKeluarga;

class PantauanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuisoner = Kuisoner::count();
        $user = User::whereHas('kartu_keluarga')->get();
        $respon_user['respon_users'] = ResponUser::with('bulan', 'kartu_keluarga.status_keluarga')->get();
        $jawaban_user = JawabanUser::with('user')->get();
        return view('admin.dashboard.pantauan.index', $respon_user, compact('kuisoner', 'user', 'jawaban_user'));
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
    public function show($bulan_id, Request $request)
    {
        $user_id = $request->user_id;
        $keluargas = StatusKeluarga::where('kartu_keluarga_id' , $user_id)->get();
        foreach($keluargas as $keluarga){
            $jawaban_user['jawaban_users'] = JawabanUser::with('isi_kuisoner')->where([['bulan_id', $bulan_id], ['user_id', $keluarga->user_id]])->get();
            if($jawaban_user['jawaban_users'] != null){
                $kuisoner['kuisoners'] = Kuisoner::where('ppemantauan_id', $request->ppemantauan_id)->get();
                return view('user.dashboard.gformkuisoner.detail_jawaban', $kuisoner, $jawaban_user);
            }
        }
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
