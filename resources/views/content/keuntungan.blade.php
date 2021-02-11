@extends('../layout')
@section('title', 'Keuntungan')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Keuntungan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Keuntungan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <form action="{{ route('profit.filter') }}" method="post">
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
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Rp{{$incomes}}</h3>
                                <p>Pemasukan Bulan ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/penjualan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rp{{$outcomes}}</h3>
                                <p>Pengeluaran Bulan ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/pengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Rp{{$incomes - $outcomes}}</h3>

                                <p>Keuntungan Bulan ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/keuntungan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection