<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Courses extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $table = 'courses';
    protected $fillable = ['name', 'description', 'image', 'title_image', 'tutor', 'time', 'price'];

    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')->withTimestamps();
    }
}
