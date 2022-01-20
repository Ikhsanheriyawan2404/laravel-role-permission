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
            <li class="breadcrumb-item active">{{ Breadcrumbs::render('users') }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            @can('user-create')
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Tambah</a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Impor</a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Ekspor</a>
            @endcan
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center" style="width: 15%"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->getRoleNames() as $role)
                            <button class="btn btn-sm btn-primary">{{ $role }}</button>
                            @endforeach
                        </td>
                        <td class="text-center">
                            @can('user-list')<a class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>@endcan

                            @can('user-edit')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            @endcan

                            @can('user-delete')
                            <a id="delete" class="btn btn-sm btn-danger" onclick="confirmAction()"><i class="fas fa-trash"></i></a>
                            <form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endcan
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

@endsection

@section('custom-scripts')

    <script>
        function confirmAction()
        {
            let confirmAction = confirm("ya");
            if (confirmAction) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

@endsection
