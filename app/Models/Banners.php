<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Banners extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'banners';
    protected $fillable = ['name', 'image', 'text', 'subtext', 'title_image', 'status', 'page', 'section'];
}
