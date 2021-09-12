@extends('layouts.simple.master')
@section('title', 'Datai Data Peminjam')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css') }}/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css') }}/vendors/sweetalert2.css">
    <!-- Plugins css Ends-->
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Detail Data</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Detail Data Peminjam</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>tanggal_input</th>
                                        <th>{{ $data->tanggal_input }}</th>
                                    </tr>
                                    <tr>
                                        <th>nik</th>
                                        <th>{{ $data->nik }}</th>
                                    </tr>
                                    <tr>
                                        <th>nopen</th>
                                        <th>{{ $data->nopen }}</th>
                                    </tr>
                                    <tr>
                                        <th>nama</th>
                                        <th>{{ $data->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_jalan</th>
                                        <th>{{ $data->alamat_jalan }}</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_kec</th>
                                        <th>{{ $data->alamat_kec }}</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_kotakab</th>
                                        <th>{{ $data->alamat_kotakab }}</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_propinsi</th>
                                        <th>{{ $data->alamat_propinsi }}</th>
                                    </tr>
                                    <tr>
                                        <th>telepon</th>
                                        <th>{{ $data->telepon }}</th>
                                    </tr>
                                    <tr>
                                        <th>pembiayaan</th>
                                        <th>{{ $data->pembiayaan }}</th>
                                    </tr>
                                    <tr>
                                        <th>tenor</th>
                                        <th>{{ $data->tenor }}</th>
                                    </tr>
                                    <tr>
                                        <th>cicilan</th>
                                        <th>{{ $data->cicilan }}</th>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <th>{{ $data->status }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_ktp</th>
                                        <th>{{ $data->url_ktp }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_kk</th>
                                        <th>{{ $data->url_kk }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_karip</th>
                                        <th>{{ $data->url_karip }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_sk_pensiun</th>
                                        <th>{{ $data->url_sk_pensiun }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_video_interview</th>
                                        <th>{{ $data->url_video_interview }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_video_kesehatan</th>
                                        <th>{{ $data->url_video_kesehatan }}</th>
                                    </tr>
                                    <tr>
                                        <th>tanggal_keputusan</th>
                                        <th>{{ $data->tanggal_keputusan }}</th>
                                    </tr>
                                    <tr>
                                        <th>keputusan</th>
                                        <th>{{ $data->keputusan }}</th>
                                    </tr>
                                    <tr>
                                        <th>url_pdf</th>
                                        <th>{{ $data->url_pdf }}</th>
                                    </tr>
                                </thead>
                            </table>
                            @if (auth()->user()->role == 'admin')
                                <a href="{{ route('admin.export', $data->id) }}" @if ($data->keputusan == 0 || $data->keputusan == 2) style="display:none"
                            @endif>
                            <button class="btn btn-info mt-4">Generate PDF</button>
                            </a>
                        @else
                            @if ($data->keputusan == 1)
                                <a id="approve" href="{{ route('user.newcustomer.acc', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" disabled>approve</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}">
                                    <button class="btn btn-danger mt-4">cancel</button>
                                </a>
                            @elseif ($data->keputusan == 2)
                                <a id="approve" data-id="{{ $data->id }}">
                                    <button class="btn btn-success me-3 mt-4 sweet-5">approve</button>
                                </a>
                                <a id="cancel" href="{{ route('user.newcustomer.cancel', $data->id) }}">
                                    <button class="btn btn-dark mt-4" disabled>cancel</button>
                                </a>
                            @else
                                <a id="approve" data-id="{{ $data->id }}">
                                    <button class="btn btn-success me-3 mt-4">approve</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}">
                                    <button class="btn btn-danger mt-4">cancel</button>
                                </a>
                            @endif
                            <a href="{{ route('user.export', $data->id) }}" @if ($data->keputusan == 0 || $data->keputusan == 2) style="display:none"
                                @endif>
                                <button class="btn btn-info ms-3 mt-4">Generate PDF</button>
                            </a>
                            @endif
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
    <!-- latest jquery-->
    <script src="{{ asset('assets/js') }}/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js') }}/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js') }}/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('assets/js') }}/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('assets/js') }}/scrollbar/simplebar.js"></script>
    <script src="{{ asset('assets/js') }}/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js') }}/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js') }}/sidebar-menu.js"></script>
    <!-- Sweet alert jquery-->
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script>
    <script src="{{ asset('assets/js') }}/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js') }}/script.js"></script>
    <script src="{{ asset('assets/js') }}/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
@endsection
