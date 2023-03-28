<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnbpoardingQues extends Model
{
    use HasFactory;

    protected $fillable = [
        'questions','options'
    ];
}
