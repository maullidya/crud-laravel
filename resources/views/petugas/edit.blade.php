@extends('layout.template')        
<!-- START FORM -->
@section ('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH PETUGAS
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH PETUGAS</li>
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
            <form action="{{ url('petugas/'.$data->id_petugas) }}" method="PUT">
              @csrf
              @method('PUT')
              <!-- Isi formulir -->
              <div class="box-body">
              <div class="form-group">
                  <input type="hidden" name="id" class="form-control" value="{{$data->id_petugas}}" required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_petugas" class="form-control" value="{{$data->nama_petugas}}" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="{{$data->username}}" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="{{$data->password}}" required>
                </div>
                <div class="form-group">
                  <label>No. Telp</label>
                  <input type="number" name="telp" class="form-control" value="{{$data->telp}}" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="{{$data->email}}" required>
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option value="">- Pilih Level -</option>
        <option value="admin" {{$data->level == 'admin' ? 'selected' : ''}}>Admin</option>
        <option value="petugas" {{$data->level == 'petugas' ? 'selected' : ''}}>Petugas</option>
                  
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
        <!-- AKHIR FORM -->
        @endsection