<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ResponUser;
use App\Models\Kuisoner;
use App\Models\Bulan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = Bulan::orderBy('id', 'desc')->first();
        $all_respon_user['all_respon_users'] = ResponUser::get();
        // $respon_user['respon_users'] = ResponUser::where('user_id', Auth::user()->id)->get(); //ini gabisa dikirim di view karna $data cuma bisa 1
        $kuisoner = Kuisoner::get();
        $check_isi_bulan = ResponUser::where([['bulan_id', $bulan->id], ['kartu_keluarga_id', Auth::user()->kartu_keluarga_id]])->first(); //ngambil data respon user buat check berapa kali sudah ngisi
        $status = '';
        if ($check_isi_bulan == null) {
            $status = 'Anda Belum Mengisi Kuisoner Bulan ' . $bulan->bulan . '!';
        }
        return view('user.dashboard.udashboard.index', $all_respon_user, compact('status', 'kuisoner'));
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
