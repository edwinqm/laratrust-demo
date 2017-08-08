@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Users
        </div>

        <div class="panel-body">
            <table id="user-roles-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#user-roles-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/users/data',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'role_name', name: 'roles.name'}
            ]
        });
    });
</script>
@endpush