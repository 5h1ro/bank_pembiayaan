
<?php $__env->startSection('title', 'Datai Data Peminjam'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Detail Data</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">Detail Data</li>
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
                                        <th>tanggal_input</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>nik</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>nopen</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>nama</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_jalan</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_kec</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_kotakab</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>alamat_proponsi</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>telepon</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>pembiayaan</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>tenor</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>cicilan</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_ktp</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_kk</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_karip</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_sk_pensiun</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_video_interview</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_video_kesehatan</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>tanggal_keputusan</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>keputusan</th>
                                        <th>isi</th>
                                    </tr>
                                    <tr>
                                        <th>url_pdf</th>
                                        <th>isi</th>
                                    </tr>
                                </thead>
                            </table>
                            <a><button class="btn btn-success me-3 mt-4">approve</button></a><a><button class="btn btn-danger mt-4">cancle</button></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Github\pinjol\resources\views/admin/detaildata.blade.php ENDPATH**/ ?>