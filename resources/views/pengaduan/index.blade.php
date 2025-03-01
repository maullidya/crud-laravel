@extends('layout.template')

@section('konten')
<div class="content-wrapper">
    <section class="content-header">
        <h1>DATA PENGADUAN</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">DATA PENGADUAN</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="{{url('pengaduan/create')}}" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <button class="btn btn-default" onclick="printData()" title="Print Data"><i class="glyphicon glyphicon-print"></i> Print</button>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="pengaduan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                  <th>ID</th>
                  <th>TANGGAL PENGADUAN</th>
                  <th>NIK</th>
                  <th>ISI LAPORAN</th>
                  <th>FOTO</th>
                  <th>STATUS</th>
                  <th>AKSI</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->id_pengaduan }}</td>
                                    <td>{{ $row->tgl_pengaduan }}</td>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ $row->isi_laporan }}</td>
                                    <td>{{ $row->foto }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <a href="{{url('pengaduan/'.$row->id_pengaduan.'/edit')}}" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                                        <form id="deleteForm{{ $row->id_pengaduan }}" action="{{ url('pengaduan/'.$row->id_pengaduan) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{ $row->id_pengaduan }}').submit();" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin mau hapus data {{ $row->nama_pengaduan }}?')">
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
        printWindow.document.write('<html><head><title>Data pengaduan</title></head><body>');
        printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }</style>');
        printWindow.document.write('<table>');
        printWindow.document.write(document.getElementById('pengaduan').innerHTML);
        printWindow.document.write('</table>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection
