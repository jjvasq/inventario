<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ip;
use Livewire\Component;
use Livewire\WithPagination;

class IpsIndex extends Component
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
        /* $ips = Ip::all(); */
        $ips = Ip::leftjoin('conexiones','ips.id','=','conexiones.ip_id')
                    ->leftjoin('puestos','conexiones.id','=','puestos.conexion_id')
                    ->select('ips.*','conexiones.id as conexion_id','puestos.nombre as nombre_puesto')
                    ->where('direccion_ip', 'LIKE', "%".$this->search."%")
                    ->orWhere('puestos.nombre', 'LIKE', "%".$this->search."%")
                    ->orderby($this->sort, $this->direction)
                    ->paginate($this->cant);
        return view('livewire.admin.ips-index', compact('ips'));
    }

    //Ordena según parámetro.
    public function order($orden){
        if ($this->sort == $orden) {
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }
            else{
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $orden;
        }
        $this->sort = $orden;
    }
}
