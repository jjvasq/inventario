<?php

namespace App\Http\Livewire\Admin;

use App\Models\Puesto;
use Livewire\Component;
use Livewire\WithPagination;

class PrincipalIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 6;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    { 
        $puestos = Puesto::leftjoin('conexiones','puestos.conexion_id','=','conexiones.id')
                    ->leftjoin('sectores','puestos.sector_id','=','sectores.id')
                    ->leftjoin('ips','conexiones.ip_id','=','ips.id')
                    ->leftjoin('conmutadores','conexiones.conmutador_id','=','conmutadores.id')
                    ->leftjoin('racks','conmutadores.rack_id','=','racks.id')
                    /* ->leftjoin('sectores','conmutadores.sector_id','=','sectores.id') */
                    ->select('puestos.*','conexiones.boca_patch as boca_patch',
                    'conexiones.boca_switch as boca_switch','conexiones.conectada_rack as conectada_rack',
                    'sectores.nombre as nombre_sector','sectores.planta as planta_sector',
                    'ips.direccion_ip as direccion_ip','ips.estado as estado_ip',
                    'conmutadores.numero as numero_conmutador','conmutadores.marca as marca_conmutador',
                    'racks.nombre as nombre_rack')
                    ->where('puestos.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('ips.direccion_ip', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('sectores.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orderby($this->sort, $this->direction)
                    ->paginate($this->cant);
        
        return view('livewire.admin.principal-index', compact('puestos'));
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
