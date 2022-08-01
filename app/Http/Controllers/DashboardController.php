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
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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
        $rata_rata_skor_list = array();
        foreach ($bulann as $bulanns) {
            $dataResponsUser = ResponUser::where([['bulan_id', $bulanns->id],  ['kartu_keluarga_id', Auth::user()->kartu_keluarga_id]])->first();
            $kuisoner = Kuisoner::count();
            if ($dataResponsUser != null) {
                $rata_rata_skor = ($dataResponsUser->total_skor) / ($kuisoner - $dataResponsUser->skor_nol);
                array_push($total_skor, $dataResponsUser->total_skor);
                array_push($rata_rata_skor_list, $rata_rata_skor);
            } else {
                $rata_rata_skor = 0;
                array_push($total_skor, 0);
                array_push($rata_rata_skor_list,  $rata_rata_skor);
            }
        }

        if (count($total_skor) < 12) {
            $perulangan = 12 - count($total_skor);
            for ($i = 0; $i < $perulangan; $i++) {
                array_push($total_skor, 0);
                array_push($rata_rata_skor_list, 0);
            }
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
            ->addData('Rata-rata', $rata_rata_skor_list)
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Des']);
        // return view('user.dashboard.udashboard.index', compact('status', 'kuisoner'), $all_respon_user, [

        // ini buat pie chart 
        $sehat = 0;
        $belum_sehat = 0;
        foreach ($all_respon_users as $all_respon_user) { //ini logic buat ngitung data dari masing" user yang nantinya dimasukin ke variabel $sehat sama $belum_sehat
            $rata_rata_skor = ($all_respon_user->total_skor) / ($kuisoner->where('ppemantauan_id', $all_respon_user->ppemantauan_id)->count() - $all_respon_user->skor_nol);
            $perbandingan = '2';
            $$perbandingan = '2';
            $total_skor_user = 0;
            foreach ($all_respon_users as $keluarga_respon) {
                if ($keluarga_respon->kartu_keluarga_id == $all_respon_user->kartu_keluarga_id) {
                    $total_skor_user = $total_skor_user + $keluarga_respon->total_skor;
                }
            }
            if ($rata_rata_skor >= $perbandingan) {
                $sehat++;
            } else {
                $belum_sehat++;
            }
        }

        $rata_sehat = 0;
        $rata_belum_sehat = 0;
        $total_warga = $sehat + $belum_sehat;
        if ($total_warga == 0) {
            $rata_sehat = 0;
        } else {
            $rata_sehat = $sehat / $total_warga * 100;
            $rata_belum_sehat = $belum_sehat / $total_warga * 100;
        }


        return view('user.dashboard.udashboard.index', [
            'udashboardChart' => $udashboardChart,
            'status' => $status,
            'bulan' => $bulan,
            'bulann' => $bulann,
            'kuisoner' => $kuisoner,
            'all_respon_users' => $all_respon_users,
            'rata_sehat' => $rata_sehat,
            'rata_belum_sehat' => $rata_belum_sehat
            // 'cari_skors->total_skor' => $cari_skors->total_skor
        ]);
    }

    public function getrata2bulan()
    {
        $bulan = Bulan::where('bulan', $_POST['bulan'])->get();
        $all_respon_users = ResponUser::where('bulan_id', $bulan->id)->get();

        $total_skor = array();
        $bulann = Bulan::orderBy('id')->get();
        $rata_rata_skor_list = array();
        foreach ($bulann as $bulanns) {
            $dataResponsUser = ResponUser::where([['bulan_id', $bulanns->id],  ['kartu_keluarga_id', Auth::user()->kartu_keluarga_id]])->first();
            $kuisoner = Kuisoner::count();
            if ($dataResponsUser != null) {
                $rata_rata_skor = ($dataResponsUser->total_skor) / ($kuisoner - $dataResponsUser->skor_nol);
                array_push($total_skor, $dataResponsUser->total_skor);
                array_push($rata_rata_skor_list, $rata_rata_skor);
            } else {
                $rata_rata_skor = 0;
                array_push($total_skor, 0);
                array_push($rata_rata_skor_list,  $rata_rata_skor);
            }
        }

        if (count($total_skor) < 12) {
            $perulangan = 12 - count($total_skor);
            for ($i = 0; $i < $perulangan; $i++) {
                array_push($total_skor, 0);
                array_push($rata_rata_skor_list, 0);
            }
        }
        $sehat = 0;
        $belum_sehat = 0;
        foreach ($all_respon_users as $all_respon_user) { //ini logic buat ngitung data dari masing" user yang nantinya dimasukin ke variabel $sehat sama $belum_sehat
            $rata_rata_skor = ($all_respon_user->total_skor) / ($kuisoner->where('ppemantauan_id', $all_respon_user->ppemantauan_id)->count() - $all_respon_user->skor_nol);
            $perbandingan = '2';
            $$perbandingan = '2';
            $total_skor_user = 0;
            foreach ($all_respon_users as $keluarga_respon) {
                if ($keluarga_respon->kartu_keluarga_id == $all_respon_user->kartu_keluarga_id) {
                    $total_skor_user = $total_skor_user + $keluarga_respon->total_skor;
                }
            }
            if ($rata_rata_skor >= $perbandingan) {
                $sehat++;
            } else {
                $belum_sehat++;
            }
        }

        $rata_sehat = 0;
        $rata_belum_sehat = 0;
        $total_warga = $sehat + $belum_sehat;
        if ($total_warga == 0) {
            $rata_sehat = 0;
        } else {
            $rata_sehat = $sehat / $total_warga * 100;
            $rata_belum_sehat = $belum_sehat / $total_warga * 100;
        }

        $dataPoints = [
            ['label' => 'Sehat', 'y' => $rata_sehat],
            ['label' => 'Belum Sehat', 'y' => $rata_belum_sehat],
        ];

        return json_encode($dataPoints);
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
