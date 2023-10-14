<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LibraryBg extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'library_bgs';

    protected $fillable = ['backgound'];
}
