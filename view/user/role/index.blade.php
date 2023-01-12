@extends('admin.layout.master')
@section('title','Role')
@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5><a href="{{ url('admin/users') }}">Role List</a></h5>
                </div>
                <div class="col-8">
                    <!-- something will go here -->
                </div>
            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive table-hover">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-nowrap">{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="status status-green">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('admin/roles/permissions/assign/'.$role->id) }}" class="btn btn-success btn-sm text-nowrap">Assign Permission</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{-- {{ $roles->links() }} --}}
        </div>

    </div>
</div>

@endsection
