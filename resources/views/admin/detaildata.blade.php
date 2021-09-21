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
    <li class="breadcrumb-item active">Detail Data Peminjam</li>
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
                                        <th>Tanggal Input</th>
                                        <th>{{ $data->tanggal_input }}</th>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <th>{{ $data->nik }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nopen</th>
                                        <th>{{ $data->nopen }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>{{ $data->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <th>{{ $data->tanggal_lahir }}</th>
                                    </tr>
                                    <tr>
                                        <th>Jalan</th>
                                        <th>{{ $data->alamat_jalan }}</th>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <th>{{ $data->alamat_kec }}</th>
                                    </tr>
                                    <tr>
                                        <th>Kota/Kabupaten</th>
                                        <th>{{ $data->alamat_kotakab }}</th>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <th>{{ $data->alamat_propinsi }}</th>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <th>{{ $data->telepon }}</th>
                                    </tr>
                                    <tr>
                                        <th>Pembiayaan</th>
                                        <th>Rp {{ number_format($data->pembiayaan, 0, ',', '.') }},-</th>
                                    </tr>
                                    <tr>
                                        <th>Tenor</th>
                                        <th>{{ $data->tenor }} Bulan</th>
                                    </tr>
                                    <tr>
                                        <th>Cicilan</th>
                                        <th>Rp {{ number_format($data->cicilan, 0, ',', '.') }},-</th>
                                    </tr>
                                    <tr>
                                        <th>Gaji Pokok</th>
                                        <th>Rp {{ number_format($data->gaji_pokok, 0, ',', '.') }},-</th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>
                                            @if ($data->keputusan_bank == 0)
                                                Belum Ada Keputusan
                                            @elseif ($data->keputusan_bank == 1)
                                                Disetujui
                                            @else
                                                Tidak Disetujui
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url KTP</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_ktp }}">KTP</a></th>
                                    </tr>
                                    <tr>
                                        <th>Url KK</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_kk }}">KK</a></th>
                                    </tr>
                                    <tr>
                                        <th>Url karip</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_karip }}">Karip</a></th>
                                    </tr>
                                    <tr>
                                        <th>Url SK Pensiun</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_sk_pensiun }}">SK Pensiun</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url Video Interview</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="{{ $data->url_video_interview }}">Video Interview</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url Video Kesehatan</th>
                                        <th><a class="btn btn-outline-info" href="{{ $data->url_video_kesehatan }}"
                                                target=" _blank">Video
                                                Kesehatan</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Keputusan</th>
                                        <th>{{ $data->tanggal_keputusan }}</th>
                                    </tr>
                                    <tr>
                                        <th>Keputusan Bank</th>
                                        <th>
                                            @if ($data->keputusan_bank == 0)
                                                Belum Ada Keputusan
                                            @elseif ($data->keputusan_bank == 1)
                                                Disetujui
                                            @else
                                                Tidak Disetujui
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Keputusan Asuransi</th>
                                        <th>
                                            @if ($data->keputusan_asuransi == 0)
                                                Belum Ada Keputusan
                                            @elseif ($data->keputusan_asuransi == 1)
                                                Disetujui
                                            @else
                                                Tidak Disetujui
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url PDF</th>
                                        @if (isset($data->url_pdf))
                                            <th><a class="btn btn-outline-info" target=" _blank"
                                                    href="{{ $data->url_pdf }}">PDF</a></th>
                                        @else
                                            <th></th>
                                        @endif

                                    </tr>
                                </thead>
                            </table>
                            @if (auth()->user()->role == 'admin')
                                <a href="{{ route('admin.export', $data->id) }}" @if ($data->keputusan_bank == 0 || $data->keputusan_bank == 2)
                                    style="display:none"
                            @endif>
                            <button class="btn btn-info mt-4">Generate PDF</button>
                            </a>
                        @else
                            <script type="text/javascript">
                                function enable() {
                                    document.getElementById("btnapprove").disabled = false;
                                    document.getElementById("btnapprove").classList.add('btn-success');
                                    document.getElementById("btnapprove").classList.remove('btn-dark');
                                    document.getElementById("btncancel").disabled = false;
                                    document.getElementById("btncancel").classList.add('btn-danger');
                                    document.getElementById("btncancel").classList.remove('btn-dark');
                                }
                            </script>

                            @if ($data->keputusan_bank == 1)
                                <a id="approve" data-id="{{ $data->id }}"
                                    href="{{ route('user.newcustomer.acc', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btnapprove" disabled>approve</button>
                                </a>
                                <a id="cancel" data-id="{{ $data->id }}"
                                    data-id="{{ route('user.newcustomer.cancel', $data->id) }}">
                                    <button class="btn btn-dark me-3 mt-4" id="btncancel" disabled>cancel</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                @elseif ($data->keputusan_bank == 2)
                                    {{-- <a id="approve" data-id="{{ $data->id }}">
                                    <button class="btn btn-success me-3 mt-4 sweet-5">approve</button>
                                </a> --}}
                                    <a id="approve" data-id="{{ $data->id }}"
                                        href="{{ route('user.newcustomer.acc', $data->id) }}">
                                        <button class="btn btn-dark me-3 mt-4" id="btnapprove" disabled>approve</button>
                                    </a>
                                    <a id="cancel" data-id="{{ $data->id }}"
                                        data-id="{{ route('user.newcustomer.cancel', $data->id) }}">
                                        <button class="btn btn-dark me-3 mt-4" id="btncancel" disabled>cancel</button>
                                    </a>
                                    <a id="edit" onclick="enable()">
                                        <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                    @else
                                        <a id="approve" data-id="{{ $data->id }}">
                                            <button class="btn btn-success me-3 mt-4">approve</button>
                                        </a>
                                        <a id="cancel" data-id="{{ $data->id }}">
                                            <button class="btn btn-danger mt-4">cancel</button>
                                        </a>
                            @endif
                            <a href="{{ route('user.export', $data->id) }}" @if ($data->keputusan_bank == 0 || $data->keputusan_bank == 2) style="display:none"
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
