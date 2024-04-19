<div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">List of Ip Addresses</h3>
            @auth
                <div class="row my-2">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createIpAddress">
                            Add Ip Address
                        </button>
                    </div>
                </div>
            @endauth
    
            @if(session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
    
            @if(session()->has('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ip Address</th>
                            <th scope="col">Label</th>
                            @auth
                                <th scope="col">Action</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($ipAddresses) > 0)
                        @foreach ($ipAddresses as $ipAddress)
                        <tr>
                            <td>{{ $ipAddress->ip_address }}</td>
                            <td>{{ $ipAddress->ip_label }}</td>
                            @auth
                                <td>
                                    <a 
                                        href="#" 
                                        wire:click.stop="showUpdateModal({{$ipAddress->id}})" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateIpAddress">Edit</a> |
                                    <a 
                                        href="#" 
                                        wire:click.stop="showViewLogsModal({{$ipAddress->id}})" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#viewLogs">View logs</a>
                                </td>
                            @endauth
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan='3'>
                                <div class="aler alert-warning text-center py-4">
                                    <h2>No available data yet!</h2>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    
            <div class="row">
                <div class="col-md-12">
                    <strong>Total: </strong> {{ $ipAddresses->total() }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $ipAddresses->links() }}
                </div>
            </div>
        </div>
    </div>

    @livewire('manage-ip-address.create', ['userUuid' => $userUuid])

    @livewire('manage-ip-address.update', ['userUuid' => $userUuid])

    @livewire('manage-ip-address.view-logs', ['userUuid' => $userUuid])
</div>
