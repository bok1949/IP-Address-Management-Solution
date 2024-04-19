<?php

namespace App\Http\Livewire\ManageIpAddress;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\IpAddress;
use App\Models\IpAddressLog;

class Update extends Component
{
    protected $listeners = [
        'setIpAddressLabel',
    ];
    protected $rules = [
        'ip_label' => 'required',
    ];
    protected $eventType = 'UPDATED';

    public $ip_label, $ipAddressId, $userUuid, $oldLabelValue;

    public function render()
    {
        return view('livewire.manage-ip-address.update');
    }

    public function setIpAddressLabel($id)
    {
        $ipAddress = IpAddress::findOrFail($id);
        $this->ip_label = $ipAddress->ip_label;
        $this->oldLabelValue = $ipAddress->ip_label;
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

            IpAddressLog::create([
                'event_type' => $this->eventType,
                'user_uuid' => $this->userUuid,
                'ip_address_id' => $this->ipAddressId,
                'changes_made' => $this->changesMade(),
                'created_at' => null,
                'updated_at' => Carbon::now(),
            ]);

            session()->flash('success', 'Ip address label is updated successfully!!');

            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while updating Ip address label!!');

            $this->cancel();
        }
    }

    public function changesMade()
    {
        return [
            'old_value' => $this->oldLabelValue,
            'new_value' => $this->ip_label,
        ];
    }

}
