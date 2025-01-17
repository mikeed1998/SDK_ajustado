<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'image', 'demo_url', 
        'repo_url', 'client_url', 'client_name', 'client_email', 
        'start_date', 'end_date', 'is_featured', 'order', 'category_id'
    ];

    // Relación inversa con Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación uno a muchos con ProjectImages
    public function images()
    {
        return $this->hasMany(ProjectImages::class);
    }

    // Relación muchos a muchos con Technologies a través de project_technologies
    public function technologies()
    {
        return $this->belongsToMany(Technologies::class, 'project_technologies');
    }
}
