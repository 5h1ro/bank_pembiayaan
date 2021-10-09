@extends('layouts.simple.master')
@section('title', 'Detail Data Pendaftar')

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
    <li class="breadcrumb-item active">Detail Data Pendaftar</li>
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
                                        <th>Nama Lengkap</th>
                                        <th>{{ $data->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamn</th>
                                        <th>{{ $data->gender }}</th>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>{{ $data->birthplace }}, {{ $data->birthday }}</th>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <th>{{ $data->address }}</th>
                                    </tr>
                                    <tr>
                                        <th>Asal Sekolah</th>
                                        <th>{{ $data->school }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai UN</th>
                                        <th>{{ $data->un }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Bahasa Indonesia</th>
                                        <th>{{ $data->indo }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Matematika</th>
                                        <th>{{ $data->mtk }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Ilmu Pengetahuan Alam</th>
                                        <th>{{ $data->ipa }}</th>
                                    </tr>
                                    <tr>
                                        <th>Foto</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_foto }}">Foto</a></th>
                                    </tr>
                                    <tr>
                                        <th>Ijazah</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_ijazah }}">Ijazah</a></th>
                                    </tr>
                                    <tr>
                                        <th>KK</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_kk }}">KK</a></th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>
                                            @if ($data->status == 0)
                                                Diproses
                                            @elseif ($data->status == 1)
                                                Diterima
                                            @elseif ($data->status == 2)
                                                Cadangan
                                            @else
                                                Tidak Diterima
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript">
                                function enable() {
                                    document.getElementById("btnterima").disabled = false;
                                    document.getElementById("btnterima").classList.add('btn-success');
                                    document.getElementById("btnterima").classList.remove('btn-dark');
                                    document.getElementById("btncadangan").disabled = false;
                                    document.getElementById("btncadangan").classList.add('btn-warning');
                                    document.getElementById("btncadangan").classList.remove('btn-dark');
                                    document.getElementById("btntolak").disabled = false;
                                    document.getElementById("btntolak").classList.add('btn-danger');
                                    document.getElementById("btntolak").classList.remove('btn-dark');
                                }
                            </script>

                            @if ($data->status == 1)
                                <a id="approve" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.acc', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btnterima" disabled>terima</button>
                                </a>
                                <a id="cadangan" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.cadangan', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btncadangan" disabled>cadangan</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.cancel', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btntolak" disabled>tolak</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                </a>
                            @elseif ($data->status == 2)
                                <a id="approve" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.acc', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btnterima" disabled>approve</button>
                                </a>
                                <a id="cadangan" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.cadangan', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btncadangan" disabled>cadangan</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.cancel', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btntolak" disabled>cancel</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                </a>
                            @elseif ($data->status == 3)
                                <a id="approve" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.acc', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btnterima" disabled>approve</button>
                                </a>
                                <a id="cadangan" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.cadangan', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btncadangan" disabled>cadangan</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}"
                                    data-id="{{ route('admin.newstudent.cancel', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btntolak" disabled>cancel</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                </a>
                            @else
                                <a id="approve" data-id="{{ $data->id }}">
                                    <button class="btn btn-success me-3 mt-4">terima</button>
                                </a>
                                <a id="cadangan" data-id="{{ $data->id }}">
                                    <button class="btn btn-warning me-3 mt-4">cadangan</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}">
                                    <button class="btn btn-danger mt-4">tolak</button>
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
