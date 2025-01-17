<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relación muchos a muchos con Projects a través de project_technologies
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technologies');
    }
}
