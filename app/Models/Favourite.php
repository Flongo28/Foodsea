<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $table = 'favourite';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'recipe_id'
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('recipe_id', '=', $this->getAttribute('recipe_id'));

        return $query;
    }
}
