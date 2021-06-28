@extends('backend/layouts.template')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Yayasan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="yayasan_form" method="POST" action="{{ isset($yayasan)? route('yayasan.update',$yayasan->id) :route('yayasan.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! isset($yayasan) ? method_field('PUT'):'' !!}
        <input type="hidden" name="id" value="{{ isset($yayasan) ? $yayasan->id : '' }}"> <br>
        <div class="card-body">
            <div class="form-group">
                <label for="yayasan">Judul</label>
                <input type="text" class="form-control" name="yayasan" id="yayasan" placeholder="Masukkan Nama Yayasan" 
                value="{{ isset($yayasan) ? $yayasan->nama_yayasan : '' }}">
            </div>
            <div class="form-group">
                <label for="yayasan">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Yayasan"
                value="{{ isset($yayasan) ? $yayasan->alamat : '' }}">
            </div>
            <div class="form-group">
                <label for="notelp">No Telp</label>
                <input type="text" class="form-control" name="notelp"  id="notelp" placeholder="Masukkan Nama No Telp"
                value="{{ isset($yayasan) ? $yayasan->no_telp : ''}}">
            </div>
            <div class="form-group">
                <label for="dokumentasi">File input Dokumentasi</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('dokumentasi') is-invalid @enderror"
                            name="dokumentasi" id="dokumentasi">
                        <label class="custom-file-label" for="dokumentasi">Choose file</label>
                    </div>
                    @error('dokumentasi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@endpush