<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use App\Models\ResponUser;
use App\Models\Kuisoner;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AdashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = KartuKeluarga::count();
        $kuisoner = Kuisoner::get();
        $all_respon_users = ResponUser::with('bulan')->get();
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

        //sehat
        $_januari = 0;
        $_februari = 0;
        $_maret = 0;
        $_april = 0;
        $_mei = 0;
        $_juni = 0;
        $_juli = 0;
        $_agustus = 0;
        $_september = 0;
        $_oktober = 0;
        $_november = 0;
        $_desember = 0;
        foreach ($all_respon_users as $all_respon_user) { //ini logic buat ngitung data dari masing" user yang nantinya dimasukin ke variabel $sehat sama $belum_sehat
            $rata_rata_skor = ($all_respon_user->total_skor) / ($kuisoner->where('ppemantauan_id', $all_respon_user->ppemantauan_id)->count() - $all_respon_user->skor_nol);
            $perbandingan = '2';
<<<<<<< HEAD
            if($all_respon_user->bulan->bulan == 'Januari'){
                if($rata_rata_skor >= $perbandingan){
=======
            if ($all_respon_user->bulan->bulan == 'Januari') {
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $januari++;
                } else {
                    $_januari++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Februari') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $februari++;
                } else {
                    $_februari++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Maret') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $maret++;
                } else {
                    $_maret++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'April') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $april++;
                } else {
                    $_april++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Mei') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $mei++;
                } else {
                    $_mei++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Juni') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $juni++;
                } else {
                    $_juni++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Juli') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $juli++;
                } else {
                    $_juli++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Agustus') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $agustus++;
                } else {
                    $_agustus++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'September') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $september++;
                } else {
                    $_september++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Oktober') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $oktober++;
                } else {
                    $_oktober++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'November') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $november++;
                } else {
                    $_november++;
                }
            } elseif ($all_respon_user->bulan->bulan == 'Desember') {
<<<<<<< HEAD
                if($rata_rata_skor >= $perbandingan){
=======
                if ($rata_rata_skor >= $perbandingan) {
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                    $desember++;
                } else {
                    $_desember++;
                }
            }
        }
        $chart = (new LarapexChart)->areaChart()
            ->setTitle('Pantauan PHBS Warga')
            ->setSubtitle('Sehat vs Belum Sehat')
            ->addData('Sehat', [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember])
            ->addData('Belum Sehat', [$_januari, $_februari, $_maret, $_april, $_mei, $_juni, $_juli, $_agustus, $_september, $_oktober, $_november, $_desember])
            ->setXAxis(
                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            );
        return view('admin.dashboard.dashboard.index', ['chart' => $chart], compact('user', 'kuisoner'));
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
