<?php $__env->startSection('title', 'Data Peminjam'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Data Archieve</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">Data Archieve</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Archieve</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="export-button">
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
                                        <th>tanggal_archieve</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $archieve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->tanggal_input); ?></td>
                                            <td><?php echo e($data->nik); ?></td>
                                            <td><?php echo e($data->nopen); ?></td>
                                            <td><?php echo e($data->nama); ?></td>
                                            <td><?php echo e($data->alamat_jalan); ?></td>
                                            <td><?php echo e($data->alamat_kec); ?></td>
                                            <td><?php echo e($data->alamat_kotakab); ?></td>
                                            <td><?php echo e($data->alamat_propinsi); ?></td>
                                            <td><?php echo e($data->telepon); ?></td>
                                            <td><?php echo e($data->pembiayaan); ?></td>
                                            <td><?php echo e($data->tenor); ?></td>
                                            <td><?php echo e($data->cicilan); ?></td>
                                            <td><?php echo e($data->status); ?></td>
                                            <td><?php echo e($data->url_ktp); ?></td>
                                            <td><?php echo e($data->url_kk); ?></td>
                                            <td><?php echo e($data->url_karip); ?></td>
                                            <td><?php echo e($data->url_sk_pensiun); ?></td>
                                            <td><?php echo e($data->url_video_interview); ?></td>
                                            <td><?php echo e($data->url_video_kesehatan); ?></td>
                                            <td><?php echo e($data->tanggal_keputusan); ?></td>
                                            <td><?php echo e($data->keputusan); ?></td>
                                            <td><?php echo e($data->url_pdf); ?></td>
                                            <td><?php echo e($data->tanggal_archieve); ?></td>
                                            <td class="col-2">
                                                <a href="<?php echo e(route('export', $data->id)); ?>"
                                                    class="btn btn-icon icon-left btn-primary">
                                                    <i class="fas fa-trash"></i> Export</a>
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/admin/archieve.blade.php ENDPATH**/ ?>