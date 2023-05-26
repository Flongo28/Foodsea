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
        'type',
        'title',
        'subtitle',
        'rating',
        'numVotes',
        'difficulty',
        'viewCount',
        'cookingTime',
        'restingTime',
        'totalTime',
        'previewImageUrlTemplate',
        'siteUrl',
        'updated_at',
        'created_at'
    ];
}
