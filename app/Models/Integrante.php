<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;

class Integrante extends Model
{
    use HasFactory;

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
