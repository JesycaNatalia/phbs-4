<?php

namespace App\Http\Controllers;

use App\Charts\UdashboardChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ResponUser;
use App\Models\Kuisoner;
use App\Models\Bulan;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UdashboardChart $udashboardChart)
    {
        $bulan = Bulan::orderBy('id', 'desc')->first();
        // dd($bulan);
        $all_respon_users = ResponUser::get();
        // <!-- // dd($all_respon_users);
        $total_skor = array();
        $bulann = Bulan::orderBy('id')->get();
        foreach ($bulann as $bulanns) {
            $x = ResponUser::where('bulan_id', $bulanns->id)->first();
            if (property_exists($x, 'total_skor')) {
                $y = $x->total_skor;
            } else {
                $y = 0;
            }
            array_push($total_skor, $y);
        }


        // $respon_user['respon_users'] = ResponUser::where('user_id', Auth::user()->id)->get(); //ini gabisa dikirim di view karna $data cuma bisa 1
        $kuisoner = Kuisoner::get();
        $check_isi_bulan = ResponUser::where([['bulan_id', $bulan->id], ['kartu_keluarga_id', Auth::user()->kartu_keluarga_id]])->first(); //ngambil data respon user buat check berapa kali sudah ngisi
        $status = '';
        if ($check_isi_bulan == null) {
            $status = 'Anda Belum Mengisi Kuisoner Bulan ' . $bulan->bulan . '!';
        }
        // foreach ($cari_skor as $cari_skors) {
        //     $cari_skors->total_skor;
        // }

        $udashboardChart = (new LarapexChart)->lineChart()
            ->setTitle('Grafik Pantauan')
            ->setSubtitle('Total Skor  dan Skor Rata-Rata')
            ->addData('Total Skor', $total_skor)
            ->addData('Rata-rata', [40, 40])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Des']);
        // return view('user.dashboard.udashboard.index', compact('status', 'kuisoner'), $all_respon_user, [
        return view('user.dashboard.udashboard.index', [
            'udashboardChart' => $udashboardChart,
            'status' => $status,
            'kuisoner' => $kuisoner,
            'all_respon_users' => $all_respon_users,


            // 'cari_skors->total_skor' => $cari_skors->total_skor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
