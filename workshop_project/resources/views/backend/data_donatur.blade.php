@extends('backend/layouts.template')
@section('content')
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card p-0">
        <h6 class="card-title card-padding pb-0 border-bottom">Data Donatur</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">1</td>
                        <td>Sara Laiqa</td>
                        <td>Perempuan</td>
                        <td>Sumbersari, Jember</td>
                        <td>081451761812</td>
                    </tr>
                    <tr>
                        <td class="text-left">2</td>
                        <td>Miriel Yu</td>
                        <td>Perempuan</td>
                        <td>Solo</td>
                        <td>085871971861</td>
                    </tr>
                    <tr>
                        <td class="text-left">3</td>
                        <td>Thomas Alva</td>
                        <td>Laki - Laki</td>
                        <td>Jakarta Timur</td>
                        <td>085091912932</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
