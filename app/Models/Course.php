<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        "title",
        "description",
        "duration",
        "cost",
        "image",
        "category_id",
    ];
}
