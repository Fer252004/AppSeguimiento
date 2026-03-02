<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class entecoformador extends Model
{
    protected $table = 'tblentecoformador';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Tdoc',
        'Numdoc',
        'RazonSocial',
        'Direccion',
        'Telefono',
        'CorreoInstitucional'
    ];

    /**
     * Relación con aprendices (asumiendo que existe)
     */
    public function aprendices(): HasMany
    {
        return $this->hasMany(aprendices::class, 'tblentecoformador_NIS', 'NIS');
    }
}
