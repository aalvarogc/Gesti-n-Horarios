<?php

namespace App\Http\Controllers;
use App\Models\Hora;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\DB;

class HoraController extends Controller
{
    protected $horas;

    public function __construct(Hora $horas){
        $this->horas = $horas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horas = $this->horas->getHoras();
        return view('horas.lista', ['horas' => $horas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $miAsignatura = new Asignatura();
        $asignaturas = $miAsignatura->getAsignaturas();
        return view('horas.crear', ['asignaturas' => $asignaturas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horas = new Hora($request->all());
        $horas->save();
        return redirect()->action([HorarioController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horas = $this->horas->getHoraById($id);
        return view('horas.ver', ['horas' => $horas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        // deserializo las claves primarias para borrar una hora
        $array_recibido = stripslashes($ids);
        $array_recibido = urldecode($array_recibido);
        $array_primaryKeys = unserialize($array_recibido);
        $hora = DB::table('horas')
        ->where('diaH', '=', $array_primaryKeys[0])
        ->where('horaH', '=', $array_primaryKeys[1])
        ->where('codAs', '=', $array_primaryKeys[2])
        ->delete();
        return redirect()->action([HorarioController::class, 'index']);
    }
}
