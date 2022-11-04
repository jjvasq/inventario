<?php

namespace App\Http\Livewire\Admin;

use App\Models\Conmutador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ConmutadoresIndex extends Component
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
        $conmutadores = Conmutador::where('id', 'LIKE', "%" . $this->search . "%")
            ->orWhere('numero', 'LIKE', "%" . $this->search . "%")
            ->orWhere('marca', 'LIKE', "%" . $this->search . "%")
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant);

        /* $conmutadores = DB::table('conmutadores')
            ->join('sectores', 'conmutadores.sector_id', '=', 'sectores.id')
            ->join('racks', 'conmutadores.rack_id', '=', 'racks.id') 
            ->select('conmutadores.*', 'sectores.nombre as sector_nombre', 'racks.nombre as rack_nombre')
            ->select('conmutadores.*')
            ->where('numero', 'LIKE', "%" . $this->search . "%")
            ->orWhere('marca', 'LIKE', "%" . $this->search . "%")
            ->get()
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant);*/
        return view('livewire.admin.conmutadores-index', compact('conmutadores'));
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
