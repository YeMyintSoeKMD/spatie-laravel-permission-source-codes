@extends('admin.layout.master')
@section('title','Assign Permission')
@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5><a href="{{ url('admin/roles') }}">Assign Permission</a></h5>
                </div>
                <div class="col-8">
                    <a href="{{ url('admin/roles') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-angle-double-left"></i> Back</a>
                </div>
            </div>

        </div>

        <div class="card-body">
            <form action="{{ url('admin/roles/permissions/assign') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for=""> <span class="font-weight-bold">Role:</span> {{ $role->name }}</label>
                </div>
                <input type="hidden" name="role_id" value="{{ $role->id }}">
                <div class="form-group">
                    <label for=""> <span class="font-weight-bold">Select Permission:</span></label>
                    @foreach ($permissions as $permission)
                        <div class="form-group">
                            <input type="checkbox" name="permission_ids[]" value="{{ $permission->id }}" id="{{ $permission->id }}"
                            @foreach ($role->permissions as $rolePermission)
                                @if ($rolePermission->id === $permission->id)
                                    checked
                                @endif
                            @endforeach
                            >
                            <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>                    
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Assign Permission</button>
                </div>
            </form>
        </div>

        <div class="card-footer">
            {{-- {{ $users->links() }} --}}
        </div>

    </div>
</div>

@endsection