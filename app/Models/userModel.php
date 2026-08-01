<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ isso, não use Illuminate\Database\Eloquent\Model
use Illuminate\Notifications\Notifiable;

class userModel extends Authenticatable   // ✅ extends Authenticatable, não Model
{
    use Notifiable;

    protected $table = 'usuario'; // se o nome da tabela não for "user_models"

    protected $fillable = [
        'id',
        'nome',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    public function tarefas()
    {
        return $this->hasMany(tarefaModel::class, 'usuario_id');
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}