@extends('../layout')
@section('title', 'Input Data Pengeluaran')
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
                <form role="form" method="post" action="pengeluaran">
                    @csrf
                    @include('utilities.flash-messages')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jumlah">Jumlah Ayam</label>
                            <input type="number" class="form-control @error('jumlahAyam') is-invalid @enderror"
                                id="jumlah" placeholder="Masukan Jumlah Ayam" name="jumlahAyam">
                            @error('jumlahAyam')
                            <div class="d-block invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Jual</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                placeholder="Masukan Harga" name="harga">
                            @error('harga')
                            <div class="d-block invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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