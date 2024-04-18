@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Login Page</h3>

                    @if(Session::has('errorMessage'))
                    <div class="alert alert-danger my-2 col-md-9 offset-2 text-center">
                        {{ Session::get('errorMessage') }}
                    </div>
                    @endIf

                    <div class="row my-2">
                        <div class="col-md-12">
                            <form action="{{ route('post.login') }}" method="POST">
                                @csrf
                                <div class="form-group row my-2">
                                    <label class="col-md-3 text-end">Email</label>
                                    <div class="col-md-8">
                                        <input 
                                            type="text" 
                                            name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{old('email')}}"
                                            placeholder="Enter your Email">
                                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 text-end">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter your Password">
                                        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row my-4">
                                    <div class="col-md-8 offset-5">
                                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection