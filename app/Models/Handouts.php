<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handouts extends Model
{
    use HasFactory;
    protected $table = 'handouts';
    protected $fillable = ['image', 'name', 'price', 'discount', 'description'];
}
