<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryBg extends Model
{
    use HasFactory;

    protected $table = 'library_bgs';

    protected $fillable = ['backgound'];
}
