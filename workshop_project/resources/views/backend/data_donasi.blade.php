@extends('backend/layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Donasi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Donasi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donasi as $item)
                <tr>
                    <td>{{ $item->nama_donasi }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <div>
                            <form
                                action="{{ $item->is_active == 1 ? route('donasi.nonactive',$item->id) : route('donasi.active',$item->id)  }}"
                                method="POST">
                                <a href="{{ route('donasi.edit',$item->id) }}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i></a>
                                @csrf
                                @method('PUT')
                                @if ($item->is_active == 1)
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Pakah Anda Yakin Ingin Menonaktifkan Data Ini?')">
                                    <i class="fa fa-exclamation"></i></button>
                                @else
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Pakah Anda Yakin Ingin Mengaktifkan Data Ini?')">
                                    <i class="fa fa-check"></i></button>
                                @endif
                            </form>
                        </div>
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