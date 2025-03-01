@extends('layout.template')        

<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH TANGGAPAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH TANGGAPAN</li>
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
            <form role="form" method="post" action="{{url('tanggapan')}}" id="tanggapanForm">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Pengaduan</label>
                  <input type="text" name="pengaduan" id="pengaduan" class="form-control pencarian-pengaduan" placeholder="Pengaduan" value="{{ Session::get ('id_pengaduan')}}" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Tanggapan</label>
                  <input type="date" name="tgl" class="form-control" value="{{ Session::get ('tgl_tanggapan')}}" required>
                </div>
                <div class="form-group">
                  <label>Isi Tanggapan</label>
                <textarea name="tanggapan" class="form-control" value="{{ Session::get ('tanggapan')}}" required></textarea>
                </div>
                <div class="form-group">
                  <label>Petugas</label>
                  <input type="text" name="petugas" id="petugas" class="form-control" required value="{{ Session::get ('id_petugas')}}">
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
    // Mengarahkan pengguna ke halaman "tanggapan" setelah formulir berhasil dikirim
    document.getElementById('tanggapanForm').addEventListener('submit', function() {
      window.location.href = "{{url('tanggapan')}}";
    });
  </script>

@endsection
