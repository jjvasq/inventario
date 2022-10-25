<?php

namespace App\Http\Livewire\Admin\Puestos;

use App\Models\Conmutador;
use Livewire\Component;

class PuestosCreate extends Component
{
    public $search;

    public function render()
    {
        $conmutadores = Conmutador::leftjoin('racks','conmutadores.rack_id','=','racks.id')
                                    ->leftjoin('sectores', 'conmutadores.sector_id', '=', 'sectores.id')
                                    ->select('conmutadores.*','sectores.nombre as nombre_sector',
                                    'racks.nombre as nombre_rack')
                                    ->where('numero','LIKE', "%" .$this->search . "%")
                                    ->orWhere('sectores.nombre', 'LIKE', '%' . $this->search .'%')
                                    ->orWhere('racks.nombre', 'LIKE', '%' . $this->search .'%') 
                                    ->get();

        return view('livewire.admin.puestos.puestos-create', compact('conmutadores'));
    }
}
