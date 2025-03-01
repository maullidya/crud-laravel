@extends('layout.template')        

<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH PETUGAS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH PETUGAS</li>
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
            <form role="form" method="post" action="{{url('petugas')}}" id="petugasForm">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_petugas" class="form-control" placeholder="nama" value="{{ Session::get ('nama_petugas')}}" required>
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
                  <input type="number" name="telp" class="form-control" placeholder="No. Telp" value="{{ Session::get ('telp')}}"required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{ Session::get ('email')}}"required>
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level" value="{{ Session::get ('level')}}">
                    <option value="">- Pilih Level -</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                  
                  </select>
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
    // Mengarahkan pengguna ke halaman "petugas" setelah formulir berhasil dikirim
    document.getElementById('petugasForm').addEventListener('submit', function() {
      window.location.href = "{{url('petugas')}}";
    });
  </script>

@endsection
