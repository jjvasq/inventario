<?php

namespace App\Http\Livewire\Admin;

use App\Models\Puesto;
use Livewire\Component;
use Livewire\WithPagination;

class PuestosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 3;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {
        $puestos = Puesto::where('id', 'LIKE', "%" . $this->search . "%")
            ->orWhere('nombre', 'LIKE', "%" . $this->search . "%")
            ->orWhere('descripcion', 'LIKE', "%" . $this->search . "%")
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.admin.puestos-index', compact('puestos'));
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
