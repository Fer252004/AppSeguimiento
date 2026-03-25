<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class aprendices extends Model
{

use Notifiable;


    protected $table = 'tblaprendices';
    protected $primaryKey = 'NIS';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'Numdoc',
        'Nombres',
        'Apellidos',
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'CorreoPersonal',
        'Sexo',
        'FechaNac',
        'tbleps_NIS',
        'tbltiposdocumentos_NIS',
        'tblfichadecaracterizacion_NIS',
        'doc_anexo'
    ];

    public function getSexoTextoAttribute()
    {
        return $this->Sexo == 1 ? 'Masculino' : 'Femenino';
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbleps_NIS', 'NIS');
    }

    public function tiposdocumentos()
    {
        return $this->belongsTo(Tiposdocumentos::class, 'tbltiposdocumentos_NIS', 'NIS');
    }

    public function fichadecaracterizacion()
    {
        return $this->belongsTo(Fichadecaracterizacion::class, 'tblfichadecaracterizacion_NIS', 'NIS');
    }
    
    public function getNombreCompletoAttribute()
    {
        return $this->Nombres . ' ' . $this->Apellidos;
    }
}