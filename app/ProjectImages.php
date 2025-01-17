<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    protected $fillable = ['image_url', 'project_id'];

    // Relación inversa con Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
