<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Handouts extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'handouts';
    protected $fillable = ['image', 'name', 'price', 'discount', 'description'];
}
