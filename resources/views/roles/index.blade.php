@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Roles
        </div>

        <div class="panel-body">
            <table id="role-permissions-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Permissions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#role-permissions-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/admin/roles/data',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'display_name'},
                {data: 'description'},
                {data: 'permission_name', name: 'permissions.name'}
            ]
        });
    });
</script>
@endpush