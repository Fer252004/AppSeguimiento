<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class regionales extends Model
{
    protected $table = 'tblregionales';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones'
    ];

    /**
     * Relación con centros de formación
     */
    public function centrosFormacion(): HasMany
    {
        return $this->hasMany(centrodeformacion::class, 'tblregionales_NIS', 'NIS');
    }
}
