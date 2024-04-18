<?php

namespace App\Http\Livewire\ManageIpAddress;

use Livewire\Component;
use App\Models\IpAddress;

class Update extends Component
{
    protected $listeners = [
        'setIpAddressLabel',
    ];

    protected $rules = [
        'ip_label' => 'required',
    ];

    public $ip_label, $ipAddressId;

    public function render()
    {
        return view('livewire.manage-ip-address.update');
    }

    public function setIpAddressLabel($id)
    {
        $ipAddress = IpAddress::findOrFail($id);
        $this->ip_label = $ipAddress->ip_label;
        $this->ipAddressId = $ipAddress->id;
    }

    public function cancel()
    {
        $this->resetFields();
        return redirect()->route('index');
    }

    public function resetFields()
    {
        $this->ip_label = '';
    }

    public function update()
    {
        $this->validate();

        try {
            IpAddress::find($this->ipAddressId)->fill([
                'ip_label' => $this->ip_label
            ])->save();

            session()->flash('success', 'Ip address label is updated successfully!!');

            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while updating Ip address label!!');

            $this->cancel();
        }
    }
}
