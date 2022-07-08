<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KartuKeluarga;
use App\Models\StatusKeluarga;
use App\Models\Kuisoner;
use App\Models\Ppemantauan;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $user = User::where('nama', $request->nama)->first();
        if ($user == null) {
            return redirect()->back()->with('ERR', 'Nama yang Anda masukkan tidak terdaftar.');
        }
        if (!Auth::attempt(['nama' => $request->nama, 'password' => $request->password])) {
            return redirect()->back()->with('ERR', 'Password yang Anda masukkan salah.');
        }

        $ppemantauan['ppemantauan'] = Ppemantauan::get();
        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard.ppemantauan.index', $ppemantauan);
        } else {
            return redirect()->route('user.dashboard.laporankuisoner.index');
        }
    }

    public function index_register()
    {
        return view('auth.register');
    }

    public function reset_password()
    {
        return view('auth.passwords.reset');
    }

    public function update_password(Request $request)
    {
        $user = User::where('nik', $request->nik)->first();
        $user->update([
            'password' => bcrypt($request->password),
        ]);
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $data_kk = KartuKeluarga::where('no_kk', $request->no_kk)->first();
        if ($data_kk == null) {
            $kartu_keluarga = KartuKeluarga::create([
                'no_kk' => $request->no_kk,
            ]);
        } else {
            $kartu_keluarga = $data_kk;
        }

        $checker = User::where('nik', $request->nik)->first();
        if($checker == null){
            $user = User::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'kartu_keluarga_id' => $kartu_keluarga->id,
                'status_kepala' => $request->status_kepala,
                'jenis_kelamin' => $request->jenis_kelamin,
                'password' => bcrypt($request->password),
                'role' => 'user'
            ]);
    
            StatusKeluarga::create([
                'kartu_keluarga_id' => $kartu_keluarga->id,
                'user_id' => $user->id,
            ]);
    
            return view('auth.login');
        } else {
            echo 'Nik sudah terdaftar';
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('OK', 'Berhasil logout');
    }
}
