<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'avatar',
        'omang',
        'utility_doc',
        'occupation',
        'employer',
        'employer_email',
        'address',
        'bio',
        'status_id',
        'user_id',
        'message',
    ];
   

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function status() {
        return $this->belongsTo('App\Models\Status');
    }
}
