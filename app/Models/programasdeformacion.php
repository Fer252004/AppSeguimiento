<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class programasdeformacion extends Model
{
    protected $table = 'tblprogramasdeformacion';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones'
    ];

    /**
     * Relación con fichas de caracterización
     */
    public function fichasCaracterizacion(): HasMany
    {
        return $this->hasMany(fichadecaracterizacion::class, 'tblprogramasdeformacion_NIS', 'NIS');
    }
}
