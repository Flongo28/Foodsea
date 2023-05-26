<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedsIngredient extends Model
{
    use HasFactory;

    protected $table = 'needs_ingredient';
    public $timestamps = false;

    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'updated_at',
        'created_at'
    ];
}
