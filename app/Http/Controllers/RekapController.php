<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kuisoner;
use App\Models\IsiKuisoner;
use App\Models\Bulan;
use App\Models\JawabanUser;

class RekapController extends Controller
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
        $bulans = Bulan::get();
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
                        )->where([['kuisoner_id', $pertanyaan->id], ['user_id', Auth::user()->id]])->count();
                    array_push($skorperbulan, $skor);
                }
                $a = $skorperbulan[0] * 3;
                $b = $skorperbulan[1] * 2;
                $c = $skorperbulan[2] * 1;

                if (array_sum($skorperbulan) == 0) {
                    $ratarata = 0;
                } else {
                    $ratarata = ($a + $b + $c) / array_sum($skorperbulan);
                }
                array_push($skorperbulan, $ratarata);
                $skorperbulan = array();
                $rekap_pemantauan[$index]['bulan'] = $bulan->bulan;
                $rekap_pemantauan[$index]['tahun'] = $bulan->tahun;
                $rekap_pemantauan[$index]['data'][$j]['pertanyaan'] = $pertanyaan->pertanyaan;
                $rekap_pemantauan[$index]['data'][$j]['rata_rata'] = $ratarata;
            }
        }

        $rekap_user = array();
        $nilai_rata = array();
        for ($i = 0; $i < count($rekap_pemantauan); $i++) {
            for ($j = 0; $j < count($rekap_pemantauan[$i]['data']); $j++) {
                $nilai_rata[$i]['data'][$j] = $rekap_pemantauan[$i]['data'][$j]['rata_rata'];
                $nilai_rata[$i]['data_pemantauan'][$j] = $rekap_pemantauan[$i]['data'][$j]['pertanyaan'];
            }
            $rekap_user[$i]['bulan'] = $rekap_pemantauan[$i]['bulan'];
            $rekap_user[$i]['tahun'] = $rekap_pemantauan[$i]['tahun'];
            $rekap_user[$i]['max'] = max($nilai_rata[$i]['data']);
            $rekap_user[$i]['min'] = min($nilai_rata[$i]['data']);
            $rekap_user[$i]['pertanyaan_max'] = $nilai_rata[$i]['data_pemantauan'][array_search(max($nilai_rata[$i]['data']), $nilai_rata[$i]['data'])];
            $rekap_user[$i]['pertanyaan_min'] = $nilai_rata[$i]['data_pemantauan'][array_search(min($nilai_rata[$i]['data']), $nilai_rata[$i]['data'])];
        }
        // dd($rekap_user);
        return view('user.dashboard.rekap.index', compact('rekap_user'));
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
