<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;
    public $timestamps = false; //Esta línea evita la creación de los campos `updated_at`, `created_at` en la DB.
}
