<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    use HasFactory;

    protected $table = "horas";
    public $timestamps = false;
    protected $primaryKey = ['diaH', 'horaH', 'codAs'];
    public $incrementing = false; // evita error "Illegal offset type"

    protected $fillable = ['diaH', 'horaH', 'codAs'];
    protected $hidden = ['codAs'];

    public function getHoras(){
        return Hora::all();
    }

    public function getHoraById($id){
        return Hora::find($id);
    }
}
