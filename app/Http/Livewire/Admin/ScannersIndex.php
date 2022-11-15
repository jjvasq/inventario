<?php

namespace App\Http\Livewire\Admin;

use App\Models\Scanner;
use Livewire\Component;
use Livewire\WithPagination;

class ScannersIndex extends Component
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
        $scanners = Scanner::leftjoin('puestos','scanners.equipamiento_id','=','puestos.equipamiento_id')
                    ->select('scanners.*','puestos.nombre as nombre_puesto')
                    ->where('scanners.id', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('scanners.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('modelo', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('serial', 'LIKE', "%" . $this->search . "%")
                    ->orderby($this->sort, $this->direction)
                    ->paginate($this->cant);
        return view('livewire.admin.scanners-index', compact('scanners'));
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
