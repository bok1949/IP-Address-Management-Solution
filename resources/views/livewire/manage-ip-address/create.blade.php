<div>
    <div wire:ignore.self class="modal fade" id="createIpAddress" data-bs-backdrop='static' data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Ip Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Ip Address</label>
                        <div class="col-sm-8">
                            <input type="text" wire:model="ip_address"
                                class="form-control @error('ip_address') is-invalid @enderror">
                            @error('ip_address') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
    
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Ip Address Label</label>
                        <div class="col-sm-8">
                            <input type="text" wire:model="ip_label"
                                class="form-control @error('ip_label') is-invalid @enderror">
                            @error('ip_label') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" wire:click.prevent="resetFields()" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" wire:click.prevent="store()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
