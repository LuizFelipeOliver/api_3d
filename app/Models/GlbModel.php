<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlbModel extends Model
{
    use HasFactory;

    protected $table = 'glb_models';
    protected $fillable = ['client', 'name_3d', 'filename', 'filepath'];
}
