<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnologies extends Model
{
    // No necesitamos especificar un campo `primaryKey` ya que Laravel lo maneja automáticamente por la clave primaria compuesta.
    public $incrementing = false;  // Para indicar que no estamos usando un id autoincremental
    protected $primaryKey = ['project_id', 'technology_id'];

    protected $fillable = ['project_id', 'technology_id'];

    // Relación inversa con Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relación inversa con Technology
    public function technology()
    {
        return $this->belongsTo(Technologies::class);
    }
}
