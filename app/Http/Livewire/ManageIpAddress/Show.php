<?php

namespace App\Http\Livewire\ManageIpAddress;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IpAddress;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $user, $userUuid;
 
    public function mount()
    {
        // dump($this->user);
        if ($this->user) {
            $this->userUuid = $this->user->user_uuid;
        }
    }

    public function render()
    {
        $ipAddresses = IpAddress::select('id', 'ip_address', 'ip_label')->paginate(20);

        return view('livewire.manage-ip-address.show', [
            'ipAddresses' => $ipAddresses,
        ]);
    }

    public function showUpdateModal($id)
    {
        $this->emit('setIpAddressLabel', $id);
    }
}
