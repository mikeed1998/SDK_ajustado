<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    private $table = 'projects';

    protected $fillable = [
        'title', 'slug', 'description', 'content', 'category_id', 'image', 'demo_url',
        'repo_url', 'client_url', 'client_name', 'client_email', 'start_date', 'end_date',
        'is_featured', 'order',
    ];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con la galería
    public function images()
    {
        return $this->hasMany(ProjectImages::class);
    }

    // Relación con tecnologías
    public function technologies()
    {
        return $this->hasMany(ProjectTechnologies::class);
    }
}
