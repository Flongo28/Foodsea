<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeHasTag extends Model
{
    use HasFactory;

    protected $table = 'recipe_has_tag';
    public $timestamps = false;

    protected $fillable = [
        'recipe_id',
        'tag_id',
        'updated_at',
        'created_at'
    ];
}
