@extends('admin.layout.master')
@section('title','Permission')
@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5><a href="{{ url('admin/users') }}">Permission List</a></h5>
                </div>
                <div class="col-8">
                    {{-- something will go here --}}
                </div>
            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive table-hover">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $index => $permission)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
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
