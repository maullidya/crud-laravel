@extends('layout.template')        
<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH PENGADUAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH PENGADUAN</li>
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
            <form action="{{ url('pengaduan/'.$data->id_pengaduan) }}" method="PUT">
              @csrf
              @method('PUT')
              <!-- Isi formulir -->
              <div class="box-body">
                <input type="hidden" name="id" value="{{$data->id_pengaduan}}">
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl" class="form-control" value="{{$data->tgl_pengaduan}}">
                </div>
                <div class="form-group">
                  <label>Nik</label>
                  <input type="text" name="nik" id="nik" class="form-control pencarian" value="{{$data->nik}}" required readonly>
                </div>
                <div class="form-group">
                  <label>isi laporan</label>
                  <input type="text" name="isi" class="form-control" value="{{$data->isi_laporan}}">
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="gambar"> <!-- Untuk gambar baru -->
                  @if (!empty($row['foto']))
        <input type="hidden" name="foto_lama" value="{{ $row['foto'] }}"> <!-- Gambar lama -->
        <p>Gambar saat ini: {{ $row['foto'] }}</p>
    @endif
                </div>
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