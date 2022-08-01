<?php

namespace App\Http\Controllers;

use App\Models\Ppemantauan;
use App\Models\ResponUser;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Kuisoner;
use ArielMejiaDev\LarapexCharts\LarapexChart;


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
        $ppemantauan = Ppemantauan::findOrFail($id);
        $all_respon_users = ResponUser::with('bulan')->where('ppemantauan_id', $id)->get();

        // barchart
        $januari = 0;
        $februari = 0;
        $maret = 0;
        $april = 0;
        $mei = 0;
        $juni = 0;
        $juli = 0;
        $agustus = 0;
        $september = 0;
        $oktober = 0;
        $november = 0;
        $desember = 0;
        foreach ($all_respon_users as $all_respon_user) {
            if ($all_respon_user->bulan->bulan == 'Januari') {
                $januari++;
            } elseif ($all_respon_user->bulan->bulan == 'Februari') {
                $februari++;
            } elseif ($all_respon_user->bulan->bulan == 'Maret') {
                $maret++;
            } elseif ($all_respon_user->bulan->bulan == 'April') {
                $april++;
            } elseif ($all_respon_user->bulan->bulan == 'Mei') {
                $mei++;
            } elseif ($all_respon_user->bulan->bulan == 'Juni') {
                $juni++;
            } elseif ($all_respon_user->bulan->bulan == 'Juli') {
                $juli++;
            } elseif ($all_respon_user->bulan->bulan == 'Agustus') {
                $agustus++;
            } elseif ($all_respon_user->bulan->bulan == 'September') {
                $september++;
            } elseif ($all_respon_user->bulan->bulan == 'Oktober') {
                $oktober++;
            } elseif ($all_respon_user->bulan->bulan == 'November') {
                $november++;
            } elseif ($all_respon_user->bulan->bulan == 'Desember') {
                $desember++;
            }
        }
        $TotalwargaChart = (new LarapexChart)->barChart()
            ->setTitle('Total Pengisian Kuisioner Warga.')
            ->setSubtitle('Setiap Bulannya.')
            ->addData('Total Warga', [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember])
            ->setXAxis(['January', 'February', 'March', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
        return view('admin.dashboard.grafik.show', [
            'all_respon_users' => $all_respon_users,
            'user' => $user,
            'kuisoner' => $kuisoner,
            'ppemantauan' => $ppemantauan,
            'TotalwargaChart' => $TotalwargaChart
        ]);
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
