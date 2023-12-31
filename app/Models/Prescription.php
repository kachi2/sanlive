<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = "prescriptions";
    protected $fillable = ['name', 'email', 'phone', 'address', 'city', 'state', 'image', 'notes'];


}
