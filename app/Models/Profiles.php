<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profiles extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['credit', 'username', 'fname', 'lname', 'phone_number', 'birthdate', 'gender', 'bio'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
