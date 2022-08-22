<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensaje extends Model
{
    use HasFactory;
    protected $table="mensaje";

    protected $fillable = [
        "cont_mensaje",
        "fk_usuario",
        "fk_receptor",
        "archivos",
    ];
}