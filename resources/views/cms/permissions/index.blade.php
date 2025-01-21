@extends('cms.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Permissions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Permissions</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">
                        @php
                            $addUrl = route('permissions.create');
                        @endphp
                        <button onclick='getItem("{{ $addUrl }}")' class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                            Record</button>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="permissions-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Module</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $permission->module_name }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td data-sort="{{ $permission->created_at }}">{{ $permission->created_at->format('d M Y @ h:i A') }}</td>
                                            <td>
                                                @php
                                                    $editUrl = route('permissions.edit', $permission->id);
                                                @endphp
                                                <button onclick='getItem("{{ $editUrl }}")' class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
</div>
</div>
</div>
    <!-- /.row -->
@endsection
@section('footer')
    <script>
        $(function() {
            $('#permissions-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
