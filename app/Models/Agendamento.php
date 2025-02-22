<?php

namespace App\Models;

use App\Models\Horario; 
use App\Models\Procedimento; 
use App\Models\User; 



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agendamento extends Model
{
    protected $fillable = [
        'data',
        'horario_id',
        'procedimento_id',
        'user_id',
        'status'
    ];

    // Um agendamento está relacionado a um procedimento
    public function procedimento(): BelongsTo
    {
        return $this->belongsTo(Procedimento::class);
    }

    // Um agendamento está relacionado a um horário disponível
    public function horario(): BelongsTo
    {
        return $this->belongsTo(Horario::class);
    }

    /*
    // Um agendamento está relacionado a uma clínica
    public function clinica(): BelongsTo
    {
        return $this->belongsTo(Clinica::class);
    }
    */

    // Um agendamento está relacionado a um paciente
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}