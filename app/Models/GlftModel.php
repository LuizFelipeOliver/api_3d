<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlftModel extends Model
{
    use HasFactory;
    protected $table = 'objetos_3d';
    protected $fillable = ['client', 'name_3d', 'filename', 'filepath'];
}
