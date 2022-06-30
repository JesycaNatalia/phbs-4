<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\Kuisoner;
use App\Models\IsiKuisoner;
use App\Models\JawabanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PantauanSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan['bulans'] = Bulan::get();
        return view('admin.dashboard.pantauansoal.index', $bulan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.pantauansoal.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // get id pertanyaan
        $pertanyaan_id = DB::table('kuisoners')->where('pertanyaan', 'LIKE', '%' . $request->pemantauansoal . '%')->first()->id;

        // get jawaban dari pertanyaan yang id nya di atas
        $isi_kuisoner = IsiKuisoner::where('kuisoner_id', $pertanyaan_id)->get();

        // get nama bulan
        $bulan = Bulan::where('id', $request->bulan)->first();

        // hitung skor tapi masih error:)
        $skor3 = JawabanUser::with(['isi_kuisoner' => function ($query) {
            $query->where('skor', 3);
        }])->where('kuisoner_id', $pertanyaan_id)->where('bulan_id', $request->bulan)->count();

        $skor2 = JawabanUser::with(['isi_kuisoner' => function ($query) {
            $query->where('skor', 2);
        }])->where('kuisoner_id', $pertanyaan_id)->where('bulan_id', $request->bulan)->count();

        $skor1 = JawabanUser::with(['isi_kuisoner' => function ($query) {
            $query->where('skor', 1);
        }])->where('kuisoner_id', $pertanyaan_id)->where('bulan_id', $request->bulan)->count();

        return redirect()->route('admin.dashboard.pantauansoal.create')->with([
            'pertanyaan' => $request->pertanyaan,
            'isi_kuisoner' => $isi_kuisoner,
            'bulan' => $bulan,
            'skor3' => $skor3,
            'skor2' => $skor2,
            'skor1' => $skor1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('pages.admin.dashboard.pantauansoal.show');
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

    public function laporan()
    {
        return view('admin.dashboard.pantauansoal.show');
    }
}
