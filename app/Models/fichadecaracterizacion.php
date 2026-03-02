<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class fichadecaracterizacion extends Model
{
    protected $table = 'tblfichadecaracterizacion';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones',
        'Cupo',
        'FechaInicio',
        'FechaFin',
        'tblprogramasdeformacion_NIS',
        'tblcentrodeformacion_NIS'
    ];

    /**
     * Relación con programas de formación
     */
    public function programasdeformacion(): BelongsTo
    {
        return $this->belongsTo(
            programasdeformacion::class,
            'tblprogramasdeformacion_NIS',
            'NIS'
        );
    }

    /**
     * Relación con centro de formación
     */
    public function centrodeformacion(): BelongsTo
    {
        return $this->belongsTo(
            centrodeformacion::class,
            'tblcentrodeformacion_NIS',
            'NIS'
        );
    }

    /**
     * Relación con aprendices
     */
    public function aprendices(): HasMany
    {
        return $this->hasMany(aprendices::class, 'tblfichadecaracterizacion_NIS', 'NIS');
    }
}
