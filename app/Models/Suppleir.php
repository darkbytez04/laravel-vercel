<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppleir extends Model
{
     protected $fillable = ['supplier_name', 'address',
    'phone', 'email'];
    use HasFactory;
}
