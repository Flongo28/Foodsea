<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipe';

    protected $fillable = [
        'id',
        'title',
        'subtitle',
        'rating',
        'numVotes',
        'difficulty',
        'viewCount',
        'cookingTime',
        'restingTime',
        'preparationTime',
        'totalTime',
        'previewImageUrlTemplate',
        'siteUrl',
        'kCalories',
        'updated_at',
        'created_at'
    ];
}
