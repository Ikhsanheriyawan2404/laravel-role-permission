@extends('layouts.app', compact('title'))

@section('content')

<div class="container-fluid">
<!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Pengguna</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Nama lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat email</label>
                            <input type="email" name="email" class="form-control" placeholder="ex: user@mail.test">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat tempat tinggal</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Alamat email</label>
                            <input type="text" name="email" class="form-control" placeholder="ex: user@mail.test">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>
<!-- /.card -->
</div>

@endsection
