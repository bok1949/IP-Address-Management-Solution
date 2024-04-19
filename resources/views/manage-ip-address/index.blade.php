@extends('../layout')

@section('user-authenticated-name')
    <li class="nav-item">
        <span class="nav-link">{{$user->name ?? null}}</span>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            @livewire('manage-ip-address.show', ['user' => $user])
        </div>
    </div>
</div>
@endsection