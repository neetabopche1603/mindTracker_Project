<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainBalanceContents extends Model
{
    use HasFactory;
    protected $fillable = ['subCategory_id','sub_cate_title','description','images','filesData'];
}
