@extends('admin.layout.master')
@section('title', 'User')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5><a href="{{ url('admin/users') }}">User List</a></h5>
                </div>
                <div class="col-8">
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary float-right">Add New</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-hover">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td style="max-width: 150px">{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @foreach ($user->getRoleNames() as $role)
                                        <span class="status status-green">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->getPermissionsViaRoles() as $permission)
                                        <span class="status status-green">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td style="min-width: 200px">
                                    <a href="{{ url('/admin/users/' . $user->id. '/edit') }}" class="btn btn-info btn-sm mt-1">Edit</a>
                                        <a href="{{ url('admin/users/roles/assign/' . $user->id) }}" class="btn btn-success btn-sm mt-1">Assign Role</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
