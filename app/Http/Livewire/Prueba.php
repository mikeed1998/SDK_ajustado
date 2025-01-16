<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Prueba extends Component
{
    public $contador = 0;

    public function incrementar()
    {
        $this->contador++;
    }

    public function render()
    {
        return view('livewire.prueba');
    }
}
