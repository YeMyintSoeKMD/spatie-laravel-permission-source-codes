@extends('admin.layout.master')
@section('title','Assign Role')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5><a href="{{ url('admin/users') }}">Assign Role</a></h5>
                </div>
                <div class="col-8">
                    <a href="{{ url('admin/users') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-angle-double-left"></i> Back</a>
                </div>
            </div>

        </div>

        <div class="card-body">
            <form action="{{ url('admin/users/roles/assign') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for=""> <span class="font-weight-bold">User:</span> {{ $user->name }}</label>
                </div>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for=""> <span class="font-weight-bold">Select Role:</span></label>
                    @foreach ($roles as $role)
                        <div class="form-group">
                            <input type="checkbox" name="role_ids[]" value="{{ $role->id }}" id="{{ $role->id }}"
                            @foreach ($user->roles as $userRole)
                                @if ($role->id === $userRole->id)
                                    checked
                                @endif
                            @endforeach
                            >
                            <label for="{{ $role->id }}">{{ $role->name }}</label>
                        </div>                    
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Assign Role</button>
                </div>
            </form>
        </div>

        <div class="card-footer">
            {{-- {{ $users->links() }} --}}
        </div>

    </div>
</div>

@endsection
