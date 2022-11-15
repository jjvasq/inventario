<?php

namespace App\Http\Livewire\Admin;

use App\Models\Impresora;
use Livewire\Component;
use Livewire\WithPagination;

class ImpresorasIndex extends Component
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
        $impresoras = Impresora::leftjoin('puestos','impresoras.equipamiento_id','=','puestos.equipamiento_id')
                                ->select('impresoras.*','puestos.nombre as nombre_puesto')
                                ->where('impresoras.id', 'LIKE', "%" . $this->search . "%")
                                ->orWhere('impresoras.nombre', 'LIKE', "%" . $this->search . "%")
                                ->orWhere('modelo', 'LIKE', "%" . $this->search . "%")
                                ->orWhere('serial', 'LIKE', "%" . $this->search . "%")
                                ->orderby($this->sort, $this->direction)
                                ->paginate($this->cant);

        return view('livewire.admin.impresoras-index', compact('impresoras'));
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
