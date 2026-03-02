<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class centrodeformacion extends Model
{
    protected $table = 'tblcentrodeformacion';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones',
        'tblregionales_NIS'
    ];

    /**
     * Relación con regionales
     */
    public function regionales(): BelongsTo
    {
        return $this->belongsTo(regionales::class, 'tblregionales_NIS', 'NIS');
    }

    /**
     * Relación con fichas de caracterización
     */
    public function fichasCaracterizacion(): HasMany
    {
        return $this->hasMany(fichadecaracterizacion::class, 'tblcentrodeformacion_NIS', 'NIS');
    }
}
