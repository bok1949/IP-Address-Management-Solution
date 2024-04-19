<?php

namespace App\Http\Livewire\ManageIpAddress;

use Livewire\Component;
use App\Models\IpAddress;
use App\Models\IpAddressLog;

class ViewLogs extends Component
{
    protected $listeners = [
        'setViewLogs',
    ];

    public $userUuid, $ipAddress, $ipAddressLogs;

    public function render()
    {
        return view('livewire..manage-ip-address.view-logs');
    }

    public function setViewLogs($id)
    {
        $this->ipAddress = IpAddress::findOrFail($id);

        $this->ipAddressLogs = IpAddressLog::where([
                ['ip_address_id', '=', $id],
                ['user_uuid', '=', $this->userUuid],
            ])->get();
    }
}
