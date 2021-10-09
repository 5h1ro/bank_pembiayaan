<?php $__env->startSection('title', 'Data Peminjam'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <?php if($user->role == 'admin'): ?>
        <h3>Data Pendaftar</h3>
    <?php else: ?>
        <h3>Daftar</h3>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <?php if($user->role == 'admin'): ?>
        <li class="breadcrumb-item active">Data Pendaftar</li>
    <?php else: ?>
        <li class="breadcrumb-item active">Daftar</li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($user->role == 'admin'): ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Pendaftar</h5>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Asal Sekolah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($data->name); ?></td>
                                                <td><?php echo e($data->school); ?></td>
                                                <td><?php echo e($data->status); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.detaildata', $data->id)); ?>">
                                                        <button class="btn btn-primary ">
                                                            <i class="fa fa-info"></i><br>Detail Data
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php if(!isset($student)): ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Daftar</h5>
                            </div>

                            <form class="form theme-form" enctype="multipart/form-data" method="POST"
                                action="<?php echo e(route('user.add')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3 row">
                                                <div class="col-4 col-sm-3 col-xl-2">
                                                    <h4>Data Diri</h4>
                                                </div>
                                                <div class="col-8 col-sm-9 col-xl-10">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        value="<?php echo e($user->name); ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col">
                                                    <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                                        <div class="form-check form-check-inline radio radio-primary">
                                                            <input class="form-check-input" id="radioinline1" type="radio"
                                                                name="gender" value="Laki-Laki">
                                                            <label class="form-check-label mb-0"
                                                                for="radioinline1">Laki-Laki</label>
                                                        </div>
                                                        <div class="form-check form-check-inline radio radio-primary">
                                                            <input class="form-check-input" id="radioinline2" type="radio"
                                                                name="gender" value="Perempuan">
                                                            <label class="form-check-label mb-0"
                                                                for="radioinline2">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="birthplace"
                                                        name="birthplace">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control digits" id="birthday" name="birthday"
                                                        type="date">
                                                </div>
                                            </div>
                                            <div class="mb-3 row mb-0">
                                                <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="address" name="address" rows="5"
                                                        cols="5" placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Asal Sekolah</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="school" name="school">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-3 col-sm-2 col-xl-1">
                                                    <h4>Nilai</h4>
                                                </div>
                                                <div class="col-9 col-sm-10 col-xl-11">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nilai Rata - Rata UN</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control digits" type="number" id="un" name="un">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nilai Bahasa Indonesia</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control digits" type="number" id="indo" name="indo">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nilai Matematika</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control digits" type="number" id="mtk" name="mtk">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nilai Ilmu Pengetahuan Alam</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control digits" type="number" id="ipa" name="ipa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nilai Bahasa Inggris</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control digits" type="number" id="bing" name="bing">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-3 col-sm-2 col-xl-1">
                                                    <h4>Berkas</h4>
                                                </div>
                                                <div class="col-9 col-sm-10 col-xl-11">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Foto</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="foto">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Ijazah</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="ijazah">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Kartu Keluarga</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="kk">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-12 justify-content-end d-flex">
                                        <input class="btn btn-light me-3" type="reset" value="Cancel">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php if($student->status == 0): ?>
                <div class="col-xl-12 col-lg-12 xl-50 morning-sec box-col-12">
                    <div class="card o-hidden profile-greeting bg-primary">
                        <div class="card-body">
                            <div class="greeting-user text-center">
                                <div class="profile-vector"><img class="img-fluid"
                                        src="<?php echo e(asset('assets/images/dashboard/welcome.png')); ?>" alt=""></div>
                                <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span
                                        class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <p class="f-20"><span>Anda Sudah Mendaftar, Tunggu Pengumuman Selanjutnya</span>
                                </p>
                                <a href="<?php echo e(route('user.pdf', $user->id)); ?>" class="btn btn-outline-light-2x"><i
                                        class="fa fa-download">
                                    </i>Download file</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($student->status == 1): ?>
                <div class="col-xl-12 col-lg-12 xl-50 morning-sec box-col-12">
                    <div class="card o-hidden profile-greeting bg-success">
                        <div class="card-body">
                            <div class="greeting-user text-center">
                                <div class="profile-vector"><img class="img-fluid"
                                        src="<?php echo e(asset('assets/images/dashboard/welcome.png')); ?>" alt=""></div>
                                <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span
                                        class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <p class="f-20"><span>Selamat Anda Telah Diterima</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($student->status == 2): ?>
                <div class="col-xl-12 col-lg-12 xl-50 morning-sec box-col-12">
                    <div class="card o-hidden profile-greeting bg-warning">
                        <div class="card-body">
                            <div class="greeting-user text-center">
                                <div class="profile-vector"><img class="img-fluid"
                                        src="<?php echo e(asset('assets/images/dashboard/welcome.png')); ?>" alt=""></div>
                                <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span
                                        class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <p class="f-20"><span>Selamat Anda Telah Menjadi Cadangan, Pantau terus</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-xl-12 col-lg-12 xl-50 morning-sec box-col-12">
                    <div class="card o-hidden profile-greeting bg-danger">
                        <div class="card-body">
                            <div class="greeting-user text-center">
                                <div class="profile-vector"><img class="img-fluid"
                                        src="<?php echo e(asset('assets/images/dashboard/welcome.png')); ?>" alt=""></div>
                                <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span
                                        class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <p class="f-20"><span>Maaf, Anda Belum Diterima</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiro/Code/PSB/resources/views/admin/index.blade.php ENDPATH**/ ?>