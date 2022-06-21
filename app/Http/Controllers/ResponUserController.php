<?php

namespace App\Http\Controllers;

use App\Models\ResponUser;

use Illuminate\Http\Request;

class ResponUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // ResponUser::create([
        //     'bulan_id' => $request->bulan_id,
        //     'user_Id' => Auth::user()->id,
        //     'total_skor' => $request->total_skor
        // ]);

        return redirect(route('user.dashboard.gform.index'))->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponUser  $responUser
     * @return \Illuminate\Http\Response
     */
    public function show(ResponUser $responUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponUser  $responUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponUser $responUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponUser  $responUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponUser $responUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponUser  $responUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponUser $responUser)
    {
        //
    }
}
