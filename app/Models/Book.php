<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "titulo",
        "sub_titulo",
        'autor',
        'edição',
        'editora',
        'date_publish',
        'imagem',
        'id_user'
    ];
}
