<?php

namespace App\Http\Livewire\Admin;

use App\Models\Monitor;
use Livewire\Component;
use Livewire\WithPagination;

class MonitoresIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {
        $monitores = Monitor::where('id', 'LIKE', '%' . $this->search . '%')
            ->orWhere('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('tamanio', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('serial', 'LIKE', '%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.admin.monitores-index', compact('monitores'));
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
