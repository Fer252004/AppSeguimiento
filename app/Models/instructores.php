<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class instructores extends Model
{
    protected $table = 'tblinstructores';

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
        'tblrolesadministrativos_NIS'
    ];

    /**
     * Relación con EPS
     */
    public function eps(): BelongsTo
    {
        return $this->belongsTo(eps::class, 'tbleps_NIS', 'NIS');
    }

    /**
     * Relación con tipos de documentos
     */
    public function tiposdocumentos(): BelongsTo
    {
        return $this->belongsTo(tiposdocumentos::class, 'tbltiposdocumentos_NIS', 'NIS');
    }

    /**
     * Relación con roles administrativos
     */
    public function rolesadministrativos(): BelongsTo
    {
        return $this->belongsTo(rolesadministrativos::class, 'tblrolesadministrativos_NIS', 'NIS');
    }
}
