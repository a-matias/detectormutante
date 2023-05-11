<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arn extends Model
{
    protected $table = "arn";
    protected $primaryKey = "id";
    protected $fillable = [
        'descripcion',
        'mutacion'
             
       
    ];
}
