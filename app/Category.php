<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relación uno a muchos con Projects
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
