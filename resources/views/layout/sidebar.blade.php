<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        {{-- <img src="{{asset('assets/dist/img/images.jpeg')}}" class="img-circle" alt="User Image"> --}}
      </div>
      <div class="pull-left info">
        <p></p>
        {{-- <a href="#"><i class="fa fa-circle text-success"></i></a> --}}
      </div>
    </div>
    <!-- search form -->
    
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
    <li class="header">MENU</li>
    <li class="treeview">
      <li><a href="{{ route('welcome') }}"><i class="glyphicon glyphicon-home"></i> <span>Beranda</span></a></li>
    </li>
    <li class="treeview">
      <li><a href="{{url('petugas')}}"><i class="	glyphicon glyphicon-user"></i> <span>Data petugas</span></a></li>
    </li>
    <li class="treeview">
      <li><a href="{{url('masyarakat')}}"><i class="	glyphicon glyphicon-user"></i> <span>Data masyarakat</span></a></li>
    </li>
    <li class="treeview">
      <li><a href="{{url('pengaduan')}}"><i class="	glyphicon glyphicon-file"></i> <span>Data pengaduan</span></a></li>
    </li>
    <li class="treeview">
      <li><a href="{{url('tanggapan')}}"><i class="	glyphicon glyphicon-file"></i> <span>Data tanggapan</span></a></li>
    </li>
    <li class="header">SETTING</li>
      <li class="treeview">
        <li><a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Pengaturan</span></a></li>
        <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-lock"></i> <span>Logout</span></a></li>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>