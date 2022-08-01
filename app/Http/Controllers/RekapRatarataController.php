<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuisoner;
use App\Models\IsiKuisoner;
use App\Models\Bulan;
use App\Models\JawabanUser;

class RekapRatarataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_pemantauan = [
            'Cuci tangan dengan sabun dan air bersih',
            'Menggunakan air bersih',
            'Menggunakan jamban sehat',
            'Memberantas jentik nyamuk',
            'Konsumsi buah dan sayur',
            'Melakukan aktivitas fisik setiap hari',
            'Tidak merokok di dalam rumah',
        ];
        // get nama bulan
        if ($request) {
            $bulans = Bulan::where('bulan', 'like', '%' . $request->search . '%')->get();
        } else {
            $bulans = Bulan::get();
        }
        $rekap_pemantauan = array();
        foreach ($bulans as $index => $bulan) {
            for ($j = 0; $j < count($list_pemantauan); $j++) {
                $pertanyaan = Kuisoner::where('pertanyaan', 'LIKE', '%' . $list_pemantauan[$j] . '%')->first();
                $isi_kuisoner = IsiKuisoner::where('kuisoner_id', $pertanyaan->id)->get();
                $skorperbulan = array();

                // cek skor dengan perulangan
                for ($i = 3; $i >= 1; $i--) {
                    $skor = JawabanUser::where('bulan_id', $bulan->id)
                        ->whereHas(
                            'isi_kuisoner',
                            function ($query) use ($i) {
                                return $query->where('skor', $i);
                            }
                        )->where('kuisoner_id', $pertanyaan->id)->count();
                    array_push($skorperbulan, $skor);
                }
                $a = $skorperbulan[0] * 3;
                $b = $skorperbulan[1] * 2;
                $c = $skorperbulan[2] * 1;

                $ratarata = ($a + $b + $c) / array_sum($skorperbulan);
                array_push($skorperbulan, $ratarata);
                $skorperbulan = array();
                $rekap_pemantauan[$index]['bulan'] = $bulan->bulan;
                $rekap_pemantauan[$index]['tahun'] = $bulan->tahun;
                $rekap_pemantauan[$index]['data'][$j]['pertanyaan'] = $pertanyaan->pertanyaan;
                $rekap_pemantauan[$index]['data'][$j]['rata_rata'] = $ratarata;
            }
        }


        // dd($rekap_pemantauan);
        return view('admin.dashboard.rekapratarata.index', [
            'bulans' => $bulans,
            'rekap_pemantauan' => $rekap_pemantauan
        ]);
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
