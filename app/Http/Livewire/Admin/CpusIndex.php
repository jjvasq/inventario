<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cpu;
use Livewire\Component;
use Livewire\WithPagination;

class CpusIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {
        $cpus = Cpu::where('id', 'LIKE', "%" . $this->search . "%")
        ->orWhere('macaddress', 'LIKE', "%" . $this->search . "%")
        ->orWhere('procesador', 'LIKE', "%" . $this->search . "%")
        ->orderby($this->sort, $this->direction)
        ->paginate($this->cant);

        return view('livewire.admin.cpus-index', compact('cpus'));
    }

    //Ordena según parámetro.
    public function order($orden)
    {
        if ($this->sort == $orden) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $orden;
        }
        $this->sort = $orden;
    }
}
