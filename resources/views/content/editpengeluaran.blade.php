@extends('../layout')
@section('title', 'Edit Data Pengeluaran')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengeluaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengeluaran</li>
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
                    <h3 class="card-title">Pengeluaran</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="/pengeluaran/edit/{{$outcome->id}}">
                    @method('PUT')
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
                            <label for="jumlah">Jumlah Ayam</label>
                            <input type="number" class="form-control" id="jumlah" placeholder="Masukan Berat" name="jumlahAyam" value="{{$outcome->jumlahAyam}}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Beli</label>
                            <input type="number" class="form-control" id="harga" placeholder="Masukan Harga" name="harga" value="{{$outcome->harga}}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="Pengeluaran" class="btn btn-danger">Lihat Data</a>
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