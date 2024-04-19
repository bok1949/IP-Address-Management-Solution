<?php

namespace App\Http\Livewire\ManageIpAddress;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\IpAddress;
use App\Models\IpAddressLog;

class Create extends Component
{
    protected $eventType = 'CREATED';
    protected $rules = [
        'ip_address' => 'required|ipv4|unique:ip_adresses',
        'ip_label' => 'required'
    ];
    
    public $ip_address, $ip_label, $userUuid;

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
            $ipAddress = IpAddress::create([
                'ip_address' => $this->ip_address,
                'ip_label' => $this->ip_label,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]);

            $insertedId = $ipAddress->id;
            IpAddressLog::create([
                'event_type' => $this->eventType,
                'user_uuid' => $this->userUuid,
                'ip_address_id' => $insertedId,
                'created_at' => Carbon::now(),
                'updated_at' => null,
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
