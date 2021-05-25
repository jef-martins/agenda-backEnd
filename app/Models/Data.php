<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;

class Data extends Model
{
    use HasFactory;

    protected $table = 'datas';

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
