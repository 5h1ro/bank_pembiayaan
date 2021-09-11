@extends('layouts.simple.master')
@section('title', 'Data Peminjam')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data New Customer</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Data New Customer</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data New Customer</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            {{-- <table class="display" id="export-button">
                                <thead>
                                    <tr>
                                        <th>tanggal_input</th>
                                        <th>nik</th>
                                        <th>nopen</th>
                                        <th>nama</th>
                                        <th>alamat_jalan</th>
                                        <th>alamat_kec</th>
                                        <th>alamat_kotakab</th>
                                        <th>alamat_propinsi</th>
                                        <th>telepon</th>
                                        <th>pembiayaan</th>
                                        <th>tenor</th>
                                        <th>cicilan</th>
                                        <th>status</th>
                                        <th>url_ktp</th>
                                        <th>url_kk</th>
                                        <th>url_karip</th>
                                        <th>url_sk_pensiun</th>
                                        <th>url_video_interview</th>
                                        <th>url_video_kesehatan</th>
                                        <th>tanggal_keputusan</th>
                                        <th>keputusan</th>
                                        <th>url_pdf</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newcustomer as $data)
                                        <tr>
                                            <td>{{ $data->tanggal_input }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->nopen }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->alamat_jalan }}</td>
                                            <td>{{ $data->alamat_kec }}</td>
                                            <td>{{ $data->alamat_kotakab }}</td>
                                            <td>{{ $data->alamat_propinsi }}</td>
                                            <td>{{ $data->telepon }}</td>
                                            <td>{{ $data->pembiayaan }}</td>
                                            <td>{{ $data->tenor }}</td>
                                            <td>{{ $data->cicilan }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->url_ktp }}</td>
                                            <td>{{ $data->url_kk }}</td>
                                            <td>{{ $data->url_karip }}</td>
                                            <td>{{ $data->url_sk_pensiun }}</td>
                                            <td>{{ $data->url_video_interview }}</td>
                                            <td>{{ $data->url_video_kesehatan }}</td>
                                            <td>{{ $data->tanggal_keputusan }}</td>
                                            <td>{{ $data->keputusan }}</td>
                                            <td>{{ $data->url_pdf }}</td>

                                            @if (auth()->user()->role == 'admin')
                                                <td class="col-2">
                                                    <a href="{{ route('admin.detaildata', $data->id) }}"
                                                        class="btn btn-icon icon-left btn-primary">
                                                        <i class="fas fa-trash"></i>Detail Data</a>
                                                </td>
                                                <td class="col-2">
                                                    <a href="{{ route('admin.archieve.create', $data->id) }}"
                                                        class="btn btn-icon icon-left btn-primary">
                                                        <i class="fas fa-trash"></i>Archieve Data</a>
                                                </td>
                                            @else
                                                <td class="col-2">
                                                    <a href="{{ route('user.detaildata', $data->id) }}"
                                                        class="btn btn-icon icon-left btn-primary">
                                                        <i class="fas fa-trash"></i>Detail Data</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>tanggal_input</th>
                                        <th>nik</th>
                                        <th>nama</th>
                                        <th>pembiayaan</th>
                                        <th>tanggal_keputusan</th>
                                        <th>keputusan</th>
                                        <th>url_pdf</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newcustomer as $data)
                                        <tr>
                                            <td>{{ $data->tanggal_input }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->pembiayaan }}</td>
                                            <td>{{ $data->tanggal_keputusan }}</td>
                                            <td>{{ $data->keputusan }}</td>
                                            <td><a href="{{ $data->url_pdf }}">{{ $data->url_pdf }}</a></td>

                                            @if (auth()->user()->role == 'admin')
                                                <td class="col">
                                                    <a href="{{ route('admin.detaildata', $data->id) }}">
                                                        <button class="btn btn-primary w-100">
                                                            <i class="fa fa-info"></i><br>Detail
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin.archieve.create', $data->id) }}">
                                                        <button class="btn btn-primary w-100 mt-3">
                                                            <i class="fa fa-save"></i><br>Archieve
                                                        </button>
                                                    </a>
                                                </td>
                                            @else
                                                <td class="col">
                                                    <a href="{{ route('user.detaildata', $data->id) }}">
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-info"></i><br>Detail
                                                        </button>
                                                    </a>
                                                </td>
                                            @endif
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
