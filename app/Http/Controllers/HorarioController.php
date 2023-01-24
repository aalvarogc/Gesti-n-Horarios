<?php

namespace App\Http\Controllers;
use App\Models\Hora;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HorarioController extends Controller
{
    // protected $horas;

    // public function __construct(Hora $horas){
    //     $this->horas = $horas;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $horas = $this->horas->getHoras();
        // $sql = 'select h.diaH, h.horaH, h.codAs, a.nombreAs, a.nombreCortoAs, a.colorAs from horas h, asignaturas a, users u where h.codAs = a.codAs and a.userId = u.id order by h.horaH asc, h.diah asc;';
        $horas = DB::table('horas')
        ->leftJoin('asignaturas', 'horas.codAs', '=', "asignaturas.codAs")
        ->leftJoin('users', 'asignaturas.userId', '=', "users.id")
        ->where('users.id', '=', auth()->id())
        ->orderBy('horaH', 'asc')->orderBy('diaH', 'asc')->get();
        return view('horario.horario', ['horas' => $horas]);
    }
}
