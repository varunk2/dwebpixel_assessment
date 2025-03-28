<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{
    protected $fillable = [
        'title',
        'description',
        'experience',
        'salary',
        'location',
        'extra',
        'company_name',
        'company_logo'
    ];
}
