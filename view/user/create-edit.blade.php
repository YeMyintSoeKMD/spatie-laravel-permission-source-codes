@extends('admin.layout.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        @if($user->id)
            <form action="{{ url('admin/users/' . $user->id) }}" method="post">
                @method('patch')
        @else
            <form action="{{ url('admin/users') }}" method="post">
        @endif
            @csrf
            <div class="card">
                <div class="card-header">
                    <span>
                        User 
                        @if($user->id)
                            Edit
                        @else
                            Creation
                        @endif 
                    </span>
                    <a href="{{ url('/admin/users') }}" class="btn btn-secondary btn-sm float-right">
                        <i class="fa fa-angle-double-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="h6">Name</label>
                            <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="col-6">
                            <label for="" class="h6">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="" class="h6">Phone</label>
                            <input type="text" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $user->phone }}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="" class="h6">Password</label>
                            @if ($user->id)
                            <div>
                                <input type="checkbox" id="change-password" onclick="changePassword(this)">
                                <label for="change-password">Change </label>
                            </div>
                            @endif
                            <input type="text" name="password" id="password-input" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" 
                            @if ($user->id)
                                style="display:none" 
                            @endif
                            >
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ $user->id ? 'Update' : 'Create' }}" class="btn btn-primary pull-right">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script>
        function changePassword(event) {
            if (event.checked == true){
                document.getElementById('password-input').style.display = "block";
            } else {
                document.getElementById('password-input').style.display = "none";
            }
        }
    </script>
@endsection
