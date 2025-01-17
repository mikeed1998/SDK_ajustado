<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Project;

class ProjectCards extends Component
{
    public $projects;

    public function mount()
    {
        // Carga inicial de proyectos
        $this->projects = Project::latest()->get();
    }

    public function render()
    {
        return view('livewire.project-cards');
    }

    public function loadMore()
    {
        $this->projects = Project::latest()->take(count($this->projects) + 6)->get();
    }
}
