<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'recipe_tag';

    protected $fillable = [
        'id',
        'tag',
        'updated_at',
        'created_at'
    ];
}
