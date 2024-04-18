<?php

namespace App\Http\Livewire\ManageIpAddress;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\IpAddress;

class Create extends Component
{
    public $ip_address, $ip_label;

    protected $rules = [
        'ip_address' => 'required|ipv4|unique:ip_adresses',
        'ip_label' => 'required'
    ];

    public function render()
    {
        return view('livewire.manage-ip-address.create');
    }

    public function resetFields()
    {
        $this->ip_address = '';
        $this->ip_label = '';
    }

    public function store()
    {
        $this->validate();

        try {
            IpAddress::create([
                'ip_address' => $this->ip_address,
                'ip_label' => $this->ip_label,
                'created_at' => Carbon::now(),
            ]);

            session()->flash('success', 'Created successfully!');
            $this->resetFields();

            return redirect()->route('index');
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while creating Ip address!!');
            
            $this->resetFields();
        }
    }
}
