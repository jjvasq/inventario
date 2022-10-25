<?php

namespace App\Http\Livewire\Admin\Puestos;

use App\Models\Ip;
use Livewire\Component;

class BusquedaIp extends Component
{
    public $search;

    public function render()
    {
        $ips = Ip::join('conexiones', 'ips.id', '=', 'conexiones.ip_id')
                    ->join('puestos', 'conexiones.id', '=', 'puestos.conexion_id')
                    ->select('ips.*','puestos.nombre as nombre_puesto')
                    ->where('direccion_ip','LIKE', "%" .$this->search . "%")
                    ->get();

        return view('livewire.admin.puestos.busqueda-ip', compact('ips'));
    }
}
