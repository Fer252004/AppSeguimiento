<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tiposdocumentos extends Model
{
    protected $table = 'tbltiposdocumentos';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Denominacion',
        'Observaciones'
    ];

    /**
     * Relación con aprendices
     */
    public function aprendices(): HasMany
    {
        return $this->hasMany(aprendices::class, 'tbltiposdocumentos_NIS', 'NIS');
    }

    /**
     * Relación con instructores
     */
    public function instructores(): HasMany
    {
        return $this->hasMany(instructores::class, 'tbltiposdocumentos_NIS', 'NIS');
    }
}
