<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSucursal;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sucursal = UserSucursal::where('user_id', Auth::user()->id)->first();
        Session::put('sucursal_nombre', $sucursal->sucursal->descripcion);
        return view('dashboard.index');

    }
}
