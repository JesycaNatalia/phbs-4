<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUserChart;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use App\Models\ResponUser;
use App\Models\Kuisoner;
use App\Models\User;

class AdashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MonthlyUserChart $chart)
    {

        $user = KartuKeluarga::count();
        $kuisoner = Kuisoner::count();
        $all_respon_user['all_respon_users'] = ResponUser::with('bulan')->get();
        return view('admin.dashboard.dashboard.index', ['chart' => $chart->build()], $all_respon_user, compact('user', 'kuisoner'));
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
