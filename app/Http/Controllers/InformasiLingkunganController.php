<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kuisoner;
use App\Models\IsiKuisoner;
use App\Models\Bulan;
use App\Models\Saran;
use App\Models\JawabanUser;

class InformasiLingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $bulan = Bulan::orderBy('id', 'desc')->first();
        $rekap_pemantauan = array();

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
                    )->where([['kuisoner_id', $pertanyaan->id], ['user_id', Auth::user()->id]])->count();
                array_push($skorperbulan, $skor);
            }
            $a = $skorperbulan[0] * 3;
            $b = $skorperbulan[1] * 2;
            $c = $skorperbulan[2] * 1;

            $ratarata = ($a + $b + $c) / array_sum($skorperbulan);
            array_push($skorperbulan, $ratarata);
            $skorperbulan = array();
            $rekap_pemantauan['bulan'] = $bulan->bulan;
            $rekap_pemantauan['tahun'] = $bulan->tahun;
            $rekap_pemantauan['data'][$j]['pertanyaan'] = $pertanyaan->pertanyaan;
            $rekap_pemantauan['data'][$j]['rata_rata'] = $ratarata;
            $rekap_pemantauan['data'][$j]['id'] = $pertanyaan->id;
            // dd($rekap_pemantauan['data']);
        }

        $rekap_user = array();
        $nilai_rata = array();

        for ($j = 0; $j < count($rekap_pemantauan['data']); $j++) {
            $nilai_rata['data'][$j] = $rekap_pemantauan['data'][$j]['rata_rata'];
            $nilai_rata['data_pemantauan'][$j] = $rekap_pemantauan['data'][$j]['pertanyaan'];
        }
        $saran = Saran::where('kuisoner_id', $rekap_pemantauan['data'][array_search(min($nilai_rata['data']), $nilai_rata['data'])]['id'])->first();
        $rekap_user['bulan'] = $rekap_pemantauan['bulan'];
        $rekap_user['tahun'] = $rekap_pemantauan['tahun'];
        $rekap_user['max'] = max($nilai_rata['data']);
        $rekap_user['min'] = min($nilai_rata['data']);
        $rekap_user['pertanyaan_max'] = $nilai_rata['data_pemantauan'][array_search(max($nilai_rata['data']), $nilai_rata['data'])];
        $rekap_user['pertanyaan_min'] = $nilai_rata['data_pemantauan'][array_search(min($nilai_rata['data']), $nilai_rata['data'])];
        $rekap_user['saran'] = $saran->saran ?? 'Tidak ada saran';

        // dd($rekap_user);
        return view('user.dashboard.informasilingkungan.index', compact('rekap_user'));
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
