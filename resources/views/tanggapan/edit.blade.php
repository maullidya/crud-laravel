@extends('layout.template')        
<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH TANGGAPAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH TANGGAPAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ url('tanggapan/'.$data->id_tanggapan) }}" method="PUT">
              @csrf
              @method('PUT')
              <!-- Isi formulir -->
              <div class="box-body">
                <input type="hidden" name="id" value="{{$data->id_tanggapan}}">
                <div class="form-group">
                  <label>Pengaduan</label>
                  <input type="text" name="pengaduan" class="form-control" value="{{$data->id_pengaduan}}">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl" class="form-control" value="{{$data->tgl_tanggapan}}">
                </div>
                <div class="form-group">
                  <label>Tanggapan</label>
                  <input type="text" name="tanggapan"  class="form-control" value="{{$data->tanggapan}}" required readonly>
                </div>
                <div class="form-group">
                  <label>Petugas</label>
                  <input type="text" name="petugas" class="form-control" value="{{$data->id_petugas}}">
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
        <!-- AKHIR FORM -->
        @endsection