@extends('../layout')
@section('title', 'Input Data Penjualan')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penjualan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Penjualan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="/penjualan">
                    @csrf
                    @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Something it's Wrong:
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Berat Ayam</label>
                            <input type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat" name="berat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Jual</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga" name="harga">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/penjualan" class="btn btn-danger">Lihat Data</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection