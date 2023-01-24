<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    protected $asignaturas;

    public function __construct(Asignatura $asignaturas){
        $this->asignaturas = $asignaturas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = $this->asignaturas->getAsignaturas();
        return view('asignaturas.lista', ['asignaturas' => $asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreAs' => ['required'],
            'nombreCortoAs' => ['required'],
            'profesorAs' => ['required'],
            'colorAs' => ['required']
        ]);
        $asignaturas = new Asignatura($request->all());
        $asignaturas->save();
        return redirect()->action([AsignaturaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = $this->asignaturas->getAsignaturaById($id);
        return view('asignaturas.ver', ['asignatura' => $asignatura]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignatura = $this->asignaturas->getAsignaturaById($id);
        return view('asignaturas.editar', ['asignatura' => $asignatura]);
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
        $request->validate([
            'nombreAs' => ['required'],
            'nombreCortoAs' => ['required'],
            'profesorAs' => ['required'],
            'colorAs' => ['required']
        ]);
        $asignatura = Asignatura::find($id);
        $asignatura->fill($request->all());
        $asignatura->save();
        return redirect()->action([AsignaturaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('horas')
        ->leftJoin('asignaturas', 'horas.codAs', '=', 'asignaturas.codAs')
        ->where('horas.codAs', '=', $id);
        $asignatura = Asignatura::find($id);
        $asignatura->delete();
        return redirect()->action([AsignaturaController::class, 'index']);
    }
}
