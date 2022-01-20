@extends('layouts.app', compact('title'))

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">{{ $title ?? '' }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">{{ Breadcrumbs::render('home') }}</a></li> --}}
            <li class="breadcrumb-item active">{{ Breadcrumbs::render('roles') }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Tambah</a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Impor</a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Ekspor</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Nama Role</th>
                        <th class="text-center" style="width: 15%"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="text-center">
                            <a id="role_details" data-id="{{ $role->id }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>

                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                            <a id="delete" class="btn btn-sm btn-danger" onclick="confirmAction()"><i class="fas fa-trash"></i></a>
                            <form id="delete-form" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item" id="list"></li>
            </ul>
        </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {

            $('body').on('click', '#role_details', function () {
                var role_id = $(this).data('id');
                $.get("{{ route('roles.index') }}" +'/' + role_id, function (data) {
                    $('#modal-default').modal('show');
                    // $('.modal-title').html("Data Role : " + data.role.name);
                    console.log(data)
                    // $('#list').html(data.permission.name);
                })
            });
        });
    </script>
    <script>
        function confirmAction()
        {
            let confirmAction = confirm("Apakah yakin ingin menghapus?");
            if (confirmAction) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
@endsection
