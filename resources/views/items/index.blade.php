@extends('layouts.app', compact('title'))

@section('content')

<div class="container">
    <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>

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
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Deskripsi</th>
                        <th class="text-center" style="width: 15%"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>

                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                            <a id="delete" class="btn btn-sm btn-danger" onclick="confirmAction()"><i class="fas fa-trash"></i></a>
                            <form id="delete-form" action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-none">
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
