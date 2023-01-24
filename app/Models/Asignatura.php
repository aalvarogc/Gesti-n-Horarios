<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = "asignaturas";

    public $timestamps = false;

    protected $primaryKey = "codAs";

    protected $fillable = ['nombreAs', 'nombreCortoAs', 'profesorAs', 'colorAs', 'userId'];
    protected $hidden = ['codAs'];

    public function getAsignaturas(){
        return Asignatura::all()->where('userId', '=', auth()->id());
    }

    public function getAsignaturaById($id){
        return Asignatura::find($id);
    }
}
