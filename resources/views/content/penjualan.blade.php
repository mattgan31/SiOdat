@extends('../layout')
@section('title', 'Data Penjualan')
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
        <div class="col-12">
            <div class="card">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                <div class="card-header">
                    <form action="{{ route('penjualan.filter') }}" method="post">
                        <div class="form-row">
                            {{ csrf_field() }}
                            <div class="col">
                                <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
                                    <option value="0" selected disabled> Pilih Tahun</option>
                                    <?php
                                    $year = date('Y');
                                    $min = $year - 60;
                                    $max = $year;
                                    for ($i = $max; $i >= $min; $i--) {
                                        echo '<option value=' . $i . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control" id="tag_select" name="month">
                                    <option value="0" selected disabled> Pilih Bulan</option>
                                    <option value="01"> Januari</option>
                                    <option value="02"> Februari</option>
                                    <option value="03"> Maret</option>
                                    <option value="04"> April</option>
                                    <option value="05"> Mei</option>
                                    <option value="06"> Juni</option>
                                    <option value="07"> Juli</option>
                                    <option value="08"> Agustus</option>
                                    <option value="09"> September</option>
                                    <option value="10"> Oktober</option>
                                    <option value="11"> November</option>
                                    <option value="12"> Desember</option>
                                </select>
                            </div>
                            <div class="col">
                                <input class="btn btn-primary btn-block" name="submit" type="submit" value="Cari" />
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 350px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Berat Ayam</th>
                                <th>Harga Jual</th>
                                <th>Date</th>
                                <th>Update At</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $income)
                            <tr>
                                <td>{{ $income->berat }}kg</td>
                                <td>Rp{{ $income->harga }}</td>
                                <td>{{ $income->created_at }}</td>
                                <td>{{ $income->updated_at }}</td>
                                <td>
                                    <a href="/penjualan/edit/{{$income->id}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="/penjualan/delete/{{$income->id}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="/input-penjualan" class="btn btn-success">Input</a>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection