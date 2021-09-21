@extends('layouts.simple.master')
@section('title', 'Data Peminjam')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data Archieve</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Data Arsip</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Arsip</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggan Input</th>
                                        <th>NIK</th>
                                        <th>Nopen</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jalan</th>
                                        <th>Kecamatan</th>
                                        <th>Kota/Kabupaten</th>
                                        <th>Provinsi</th>
                                        <th>Telepon</th>
                                        <th>Pembiayaan</th>
                                        <th>Tenor</th>
                                        <th>Cicilan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Status</th>
                                        <th>Url KTP</th>
                                        <th>Url KK</th>
                                        <th>Url Karip</th>
                                        <th>Url SK Pensiun</th>
                                        <th>Url Video Interview</th>
                                        <th>Url Video Kesehatan</th>
                                        <th>Tanggal Keputusan</th>
                                        <th>Keputusan Bank</th>
                                        <th>Keputusan Asuransi</th>
                                        <th>Url PDF</th>
                                        <th>Tanggal Arsip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archieve as $data)
                                        <tr>
                                            <td>{{ $data->tanggal_input }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->nopen }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->tanggal_lahir }}</td>
                                            <td>{{ $data->alamat_jalan }}</td>
                                            <td>{{ $data->alamat_kec }}</td>
                                            <td>{{ $data->alamat_kotakab }}</td>
                                            <td>{{ $data->alamat_propinsi }}</td>
                                            <td>{{ $data->telepon }}</td>
                                            <td>Rp {{ number_format($data->pembiayaan, 0, ',', '.') }},-</td>
                                            <td>{{ $data->tenor }} Bulan</td>
                                            <td>Rp {{ number_format($data->cicilan, 0, ',', '.') }},-</td>
                                            <td>Rp {{ number_format($data->gaji_pokok, 0, ',', '.') }},-</td>
                                            <td>{{ $data->status }}</td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_ktp }}">KTP</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_kk }}">KK</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_karip }}">Karip</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_sk_pensiun }}">SK Pensiun</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_video_interview }}">Video Interview</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_video_kesehatan }}">Video Kesehatan</a></td>
                                            <td>{{ $data->tanggal_keputusan }}</td>
                                            <td>
                                                @if ($data->keputusan_bank == 0)
                                                    Belum Ada Keputusan
                                                @elseif ($data->keputusan_bank == 1)
                                                    Disetujui
                                                @else
                                                    Tidak Disetujui
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->keputusan_asuransi == 0)
                                                    Belum Ada Keputusan
                                                @elseif ($data->keputusan_asuransi == 1)
                                                    Disetujui
                                                @else
                                                    Tidak Disetujui
                                                @endif
                                            </td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_pdf }}">PDF</a></td>
                                            <td>{{ $data->tanggal_archieve }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
@endsection
