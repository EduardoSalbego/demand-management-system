<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demanda;
use Illuminate\Support\Facades\Auth;

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

    //usei o count em vez de um get e contar no php. assim ele conta direito no banco, mais performático e não carrega objetos
    //só pra contar
    public function index()
    {
        $userId = Auth::id();

        $totalDemandas = Demanda::where('user_id', $userId)->count();
        
        $demandasUrgentes = Demanda::where('user_id', $userId)
                                   ->where('status', 1)
                                   ->where('data_entrega', '<=', now()->addHours(72))
                                   ->count();

        return view('home', compact('totalDemandas', 'demandasUrgentes'));
    }
}
