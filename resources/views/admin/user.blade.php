@extends('layouts.simple.master')
@section('title', 'Data Peminjam')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data User</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Data User</li>
@endsection

@section('content')
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.user.add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="col-form-label">Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="text" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" type="password" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="user" selected>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($user as $data)
        <div class="modal fade" id="edituser{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="adduser"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.user.edit', $data->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="col-form-label">Nama</label>
                                <input class="form-control" type="text" id="nama" name="nama" value="{{ $data->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $data->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    @if ($data->role == 'admin')
                                        <option value="admin" selected>Admin</option>
                                        <option value="user">User</option>
                                    @else
                                        <option value="admin">Admin</option>
                                        <option value="user" selected>User</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>Data User</h5>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#adduser">
                                    <i class="fa fa-plus-square"></i><br>Tambah User
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->password }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td>
                                                <button class="btn btn-info " type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edituser{{ $data->id }}">
                                                    <i class="fa fa-edit"></i><br>Edit User
                                                </button>
                                                <a onclick="deleteuser({{ $data->id }})" id="delete"
                                                    data-id="{{ $data->id }}">
                                                    <button class="btn btn-danger ">
                                                        <i class="fa fa-trash"></i><br>Hapus User
                                                    </button>
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
    <!-- Sweet alert jquery-->
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/user.js') }}"></script>
    <script src="{{ asset('assets/js') }}/tooltip-init.js"></script>
@endsection
