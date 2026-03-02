<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rolesadministrativos extends Model
{
    protected $table = 'tblrolesadministrativos';

    protected $primaryKey = 'NIS';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Descripcion'
    ];

    /**
     * Relación con instructores
     */
    public function instructores(): HasMany
    {
        return $this->hasMany(instructores::class, 'tblrolesadministrativos_NIS', 'NIS');
    }
}
