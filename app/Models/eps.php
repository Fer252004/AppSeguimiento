<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class eps extends Model
{
    protected $table = 'tbleps';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'Numdoc',
        'Denominacion',
        'Observaciones'
    ];

    /**
     * Relación con instructores
     */
    public function instructores(): HasMany
    {
        return $this->hasMany(instructores::class, 'tbleps_NIS', 'NIS');
    }

    /**
     * Relación con aprendices
     */
    public function aprendices(): HasMany
    {
        return $this->hasMany(aprendices::class, 'tbleps_NIS', 'NIS');
    }
}
