<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Object3D extends Model
{
    use HasFactory;
    protected $table = 'objects';
    protected $fillable = ['path'];
}
