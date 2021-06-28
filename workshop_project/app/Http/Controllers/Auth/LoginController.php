<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|string',
          'password' => 'required|string|min:6',
      ]);

      /* lakukan pengecekan, jika inputan dari username formatnya adalah email, maka kita lakukan
      proses authentication menggunakan email, selain itu akan menggunakan username */

      /* TAMPUNG INFORMASI LOGINNYA, DIMANA KOLOM TYPE PERTAMA BERSIFAT DINAMIS BERDASARKAN VALUE
      PENGECEKAN DIATAS */
      $login = [
        'email' => $request->email,
        'password' => $request->password
      ];
      /* LAKUKAN LOGIN */
      if (auth()->attempt($login)) {
        //JIKA BERHASIL AKAN REDIRECT PADA HOME
        return redirect()->route('admin.index');
      }
      //JIKA SALAH MAKA KEMBALI PADA HALAMAN LOGIN DAN AKAN ADA NOTIFIKASI YANG MUNCUL
      return redirect()->route('login')->with(['error' => 'Username atau Password salah!!!']);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login')
            ->withSuccess('Terimakasih, selamat datang kembali!');
    }
}
