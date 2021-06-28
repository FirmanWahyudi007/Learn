@extends('backend/layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Artikel</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-left">#</th>
                    <th>Judul</th>
                    <th>URL</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['artikel'] as $artikel)
                <tr>
                    <td>{{ $artikel->id}}</td>
                    <td>{{ $artikel->judul_artikel}}</td>
                    <td>{{ $artikel->url_artikel}}</td>
                    <td>{{ $artikel->tanggal}}</td>
                    <td>
                        <a href="{{route('artikel.edit', $artikel->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="{{route('artikel.destroy', $artikel->id)}}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapusnya ?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('js')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endpush