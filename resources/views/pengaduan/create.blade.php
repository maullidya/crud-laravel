@extends('layout.template')        

<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH PENGADUAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH PENGADUAN</li>
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
            <form role="form" method="post" action="{{url('pengaduan')}}" id="pengaduanForm">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl" class="form-control" placeholder="Tanggal Pengaduan"value="{{ Session::get ('tgl_pengaduan')}}" required>
                </div>
                <input type="hidden" name="nik" id="nik" value="{{ session('nik') }}">                  
                <div class="form-group">
                  <label>isi laporan</label>
                  <textarea name="isi" class="form-control" placeholder="isi laporan" value="{{ Session::get ('isi_laporan')}}" required></textarea>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="gambar" class="form-control" value="{{ Session::get ('foto')}}" required>
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

  <script>
    // Mengarahkan pengguna ke halaman "pengaduan" setelah formulir berhasil dikirim
    document.getElementById('pengaduanForm').addEventListener('submit', function() {
      window.location.href = "{{url('pengaduan')}}";
    });
  </script>

@endsection
