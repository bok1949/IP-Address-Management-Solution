<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-1" 
        id="viewLogs"
        role="dialog">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vie IP Address logs</h5>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-md-2 text-end">
                            <strong>Ip Address:</strong>
                        </div>
                        <div class="col-md-4">
                            <p class="border-bottom">{{ $ipAddress->ip_address ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 text-end">
                            <strong>Ip Address Label:</strong>
                        </div>
                        <div class="col-md-4">
                            <p class="border-bottom">{{ $ipAddress->ip_label ?? '' }}</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Event type</th>
                                    <th>Changes made</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($ipAddressLogs)
                                    @foreach ($ipAddressLogs as $ipAddressLog)
                                        <tr>
                                            <td class="col-auto">
                                                {{$ipAddressLog->event_type}}
                                            </td>
                                            <td class="col-auto">
                                                @if ($ipAddressLog->changes_made)    
                                                    Changes from 
                                                    {{$ipAddressLog->changes_made['old_value']}}
                                                    to 
                                                    {{$ipAddressLog->changes_made['new_value']}}
                                                @endif
                                            </td>
                                            <td class="col-auto">
                                                {{$ipAddressLog->created_at}}
                                            </td>
                                            <td class="col-auto">
                                                {{$ipAddressLog->updated_at}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('index')}}" class="btn btn-primary">
                        Close
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
