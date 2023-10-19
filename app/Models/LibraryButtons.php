<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LibraryButtons extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'library_buttons';
    protected $fillable = ['type', 'text', 'image', 'url', 'target'];
}
