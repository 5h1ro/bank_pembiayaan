<?php $__env->startSection('title', 'Detail Data Pendaftar'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css')); ?>/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css')); ?>/vendors/sweetalert2.css">
    <!-- Plugins css Ends-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Detail Data</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">Detail Data Pendaftar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                        <th><?php echo e($data->name); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamn</th>
                                        <th><?php echo e($data->gender); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th><?php echo e($data->birthplace); ?>, <?php echo e($data->birthday); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <th><?php echo e($data->address); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Asal Sekolah</th>
                                        <th><?php echo e($data->school); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nilai UN</th>
                                        <th><?php echo e($data->un); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Bahasa Indonesia</th>
                                        <th><?php echo e($data->indo); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Matematika</th>
                                        <th><?php echo e($data->mtk); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Ilmu Pengetahuan Alam</th>
                                        <th><?php echo e($data->ipa); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Foto</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="<?php echo e($data->url_foto); ?>">Foto</a></th>
                                    </tr>
                                    <tr>
                                        <th>Ijazah</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="<?php echo e($data->url_ijazah); ?>">Ijazah</a></th>
                                    </tr>
                                    <tr>
                                        <th>KK</th>
                                        <th><a class="btn btn-outline-info" target=" _blank"
                                                href="<?php echo e($data->url_kk); ?>">KK</a></th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>
                                            <?php if($data->status == 0): ?>
                                                Diproses
                                            <?php elseif($data->status == 1): ?>
                                                Diterima
                                            <?php elseif($data->status == 2): ?>
                                                Cadangan
                                            <?php else: ?>
                                                Tidak Diterima
                                            <?php endif; ?>
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

                            <?php if($data->status == 1): ?>
                                <a id="approve" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.acc', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btnterima" disabled>terima</button>
                                </a>
                                <a id="cadangan" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.cadangan', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btncadangan" disabled>cadangan</button>
                                </a>
                                <a id="cancel" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.cancel', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btntolak" disabled>tolak</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                </a>
                            <?php elseif($data->status == 2): ?>
                                <a id="approve" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.acc', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btnterima" disabled>approve</button>
                                </a>
                                <a id="cadangan" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.cadangan', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btncadangan" disabled>cadangan</button>
                                </a>
                                <a id="cancel" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.cancel', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btntolak" disabled>cancel</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                </a>
                            <?php elseif($data->status == 3): ?>
                                <a id="approve" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.acc', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btnterima" disabled>approve</button>
                                </a>
                                <a id="cadangan" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.cadangan', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btncadangan" disabled>cadangan</button>
                                </a>
                                <a id="cancel" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('admin.newstudent.cancel', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btntolak" disabled>cancel</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                </a>
                            <?php else: ?>
                                <a id="approve" data-id="<?php echo e($data->id); ?>">
                                    <button class="btn btn-success me-3 mt-4">terima</button>
                                </a>
                                <a id="cadangan" data-id="<?php echo e($data->id); ?>">
                                    <button class="btn btn-warning me-3 mt-4">cadangan</button>
                                </a>
                                <a id="cancel" data-id="<?php echo e($data->id); ?>">
                                    <button class="btn btn-danger mt-4">tolak</button>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- latest jquery-->
    <script src="<?php echo e(asset('assets/js')); ?>/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo e(asset('assets/js')); ?>/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo e(asset('assets/js')); ?>/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo e(asset('assets/js')); ?>/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="<?php echo e(asset('assets/js')); ?>/scrollbar/simplebar.js"></script>
    <script src="<?php echo e(asset('assets/js')); ?>/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo e(asset('assets/js')); ?>/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo e(asset('assets/js')); ?>/sidebar-menu.js"></script>
    <!-- Sweet alert jquery-->
    <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sweet-alert/app.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js')); ?>/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo e(asset('assets/js')); ?>/script.js"></script>
    <script src="<?php echo e(asset('assets/js')); ?>/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiro/Code/PSB/resources/views/admin/detaildata.blade.php ENDPATH**/ ?>