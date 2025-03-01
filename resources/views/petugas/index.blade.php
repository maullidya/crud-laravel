@extends('layout.template')

@section('konten')
<div class="content-wrapper">
    <section class="content-header">
        <h1>DATA PETUGAS</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">DATA PETUGAS</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="{{url('petugas/create')}}" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <button class="btn btn-default" onclick="printData()" title="Print Data"><i class="glyphicon glyphicon-print"></i> Print</button>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="petugas" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                  <th>NAMA</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>TELP</th>
                  <th>EMAIL</th>
                  <th>LEVEL</th>
                  <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>******</td>
                                    <td>{{ $row->telp }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->level }}</td>
                                    <td>
                                        <a href="{{url('petugas/'.$row->id_petugas.'/edit')}}" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                                        <form id="deleteForm{{ $row->id_petugas }}" action="{{ url('petugas/'.$row->id_petugas) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{ $row->id_petugas }}').submit();" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin mau hapus data {{ $row->nama_petugas }}?')">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                                                            </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function printData() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Data Petugas</title></head><body>');
        printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }</style>');
        printWindow.document.write('<table>');
        printWindow.document.write(document.getElementById('petugas').innerHTML);
        printWindow.document.write('</table>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection
