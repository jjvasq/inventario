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

        $cpus = Cpu::leftjoin('puestos','cpus.equipamiento_id','=','puestos.equipamiento_id')
                    ->select('cpus.*', 'puestos.nombre as nombre_puesto')
                    ->where('macaddress', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('puestos.nombre', 'LIKE', "%" . $this->search . "%")
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
