<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\Ppemantauan;
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
        $ppemantauan['ppemantauans'] = Ppemantauan::get();
        $bulans = Bulan::get();
        $tahuns = [];
        foreach ($bulans as $index => $bulan) {
            if (!in_array($bulan->tahun, $tahuns)) {
                $tahuns[$index] = $bulan->tahun;
            }
        }
        return view('admin.dashboard.pantauansoal.index', $ppemantauan, compact('tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.dashboard.pantauansoal.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // global $tahun;

        // get id pertanyaan
        // mengambil data dari tabel kuisoners yang pertanyaanya sama dengan yang di pilih di option
        $pertanyaan = DB::table('kuisoners')->where('pertanyaan', 'LIKE', '%' . $request->pemantauansoal . '%')->first();

        // get jawaban dari pertanyaan yang id nya di atas
        $isi_kuisoner = IsiKuisoner::where('kuisoner_id', $pertanyaan->id)->get();
        // get nama bulan
        $bulans = Bulan::where('tahun', $request->tahun)->get();
        // buat array untuk menyimpan skor satu bulan
        $skorperbulan = array(); // []

        // buat array untuk menyimpan semua skor 
        $skors = array(); // []

        // $tahun = $request->tahun;

        //  dari tiap bulan di tahun yang dipilih
        foreach ($bulans as $bulan) {
            // cek skor dengan perulangan
            for ($i = 3; $i >= 1; $i--) {
                $skor = JawabanUser::where('bulan_id', $bulan->id)
                    ->whereHas(
                        'isi_kuisoner',
                        function ($query) use ($i) {
                            return $query->where('skor', $i);
                        }
                    )->where('kuisoner_id', $pertanyaan->id)->count(); // 2
                array_push($skorperbulan, $skor); // [2, 1, 2]
            }
            $a = $skorperbulan[0] * 3; // 6
            $b = $skorperbulan[1] * 2; // 2
            $c = $skorperbulan[2] * 1; // 2

            $ratarata = ($a + $b + $c) / array_sum($skorperbulan);
            array_push($skorperbulan, $ratarata); // [2,1,2,2]
            array_push($skors, $skorperbulan); // [[2,1,2,2],[1,0,2,1]]
            $skorperbulan = array();
        }
        // dd($skors);
        return redirect()->route('admin.dashboard.pantauansoal.laporan')->with([
            'pertanyaan' => $pertanyaan->pertanyaan,
            'isi_kuisoner' => $isi_kuisoner,
            'bulans' => $bulans,
            'skors' => $skors,
        ]);
    }
    public function laporan()
    {
        return view('admin.dashboard.pantauansoal.show');
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
}
