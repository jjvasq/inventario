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

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        /* $ips = Ip::all(); */
        $ips = Ip::where('direccion_ip', 'LIKE', "%".$this->search."%")->paginate(6);
        return view('livewire.admin.ips-index', compact('ips'));
    }
}
