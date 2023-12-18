<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    // I used -1 as failed and 0 as pending and 1 as successful for the status field
    // I used 1 as internet payment and zarinpal for type field
    protected $fillable = [
        'type',
        'user_id',
        'status',
        'transaction_id',
        'reference_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
