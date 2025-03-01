@extends('layout.template')        

<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH MASYARAKAT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH MASYARAKAT</li>
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
            <form role="form" method="post" action="{{url('masyarakat')}}" id="masyarakatForm">
                @csrf
              <div class="box-body">
              <div class="form-group">
                  <label>Nik</label>
                  <input type="text" name="nik" class="form-control" placeholder="nik" value="{{ Session::get ('nik')}}" required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="nama" value="{{ Session::get ('nama')}}" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" value="{{ Session::get ('username')}}" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="password" value="{{ Session::get ('password')}}"required>
                </div>
                <div class="form-group">
                  <label>No. Telp</label>
                  <input type="number" name="telp" class="form-control" placeholder="No. Telp" value="{{ Session::get ('no_telp')}}"required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{ Session::get ('email')}}"required>
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
    // Mengarahkan pengguna ke halaman "masyarakat" setelah formulir berhasil dikirim
    document.getElementById('masyarakatForm').addEventListener('submit', function() {
      window.location.href = "{{url('masyarakat')}}";
    });
  </script>

@endsection
