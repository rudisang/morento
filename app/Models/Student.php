<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar',
        'bio',
        'university',
        'program_of_study',
        'sponsored',
        'monthly_stipend',
        'next_of_kin_name',
        'next_of_kin_mobile',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
