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
                                        <th><?php echo e($data->tanggal_input); ?></th>
                                    </tr>
                                    <tr>
                                        <th>nik</th>
                                        <th><?php echo e($data->nik); ?></th>
                                    </tr>
                                    <tr>
                                        <th>nopen</th>
                                        <th><?php echo e($data->nopen); ?></th>
                                    </tr>
                                    <tr>
                                        <th>nama</th>
                                        <th><?php echo e($data->nama); ?></th>
                                    </tr>
                                    <tr>
                                        <th>alamat_jalan</th>
                                        <th><?php echo e($data->alamat_jalan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>alamat_kec</th>
                                        <th><?php echo e($data->alamat_kec); ?></th>
                                    </tr>
                                    <tr>
                                        <th>alamat_kotakab</th>
                                        <th><?php echo e($data->alamat_kotakab); ?></th>
                                    </tr>
                                    <tr>
                                        <th>alamat_propinsi</th>
                                        <th><?php echo e($data->alamat_propinsi); ?></th>
                                    </tr>
                                    <tr>
                                        <th>telepon</th>
                                        <th><?php echo e($data->telepon); ?></th>
                                    </tr>
                                    <tr>
                                        <th>pembiayaan</th>
                                        <th><?php echo e($data->pembiayaan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>tenor</th>
                                        <th><?php echo e($data->tenor); ?></th>
                                    </tr>
                                    <tr>
                                        <th>cicilan</th>
                                        <th><?php echo e($data->cicilan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <th><?php echo e($data->status); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_ktp</th>
                                        <th><?php echo e($data->url_ktp); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_kk</th>
                                        <th><?php echo e($data->url_kk); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_karip</th>
                                        <th><?php echo e($data->url_karip); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_sk_pensiun</th>
                                        <th><?php echo e($data->url_sk_pensiun); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_video_interview</th>
                                        <th><?php echo e($data->url_video_interview); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_video_kesehatan</th>
                                        <th><?php echo e($data->url_video_kesehatan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>tanggal_keputusan</th>
                                        <th><?php echo e($data->tanggal_keputusan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>keputusan</th>
                                        <th><?php echo e($data->keputusan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>url_pdf</th>
                                        <th><?php echo e($data->url_pdf); ?></th>
                                    </tr>
                                </thead>
                            </table>
                            <?php if(auth()->user()->role == 'admin'): ?>
                                <a href="<?php echo e(route('admin.export', $data->id)); ?>" <?php if($data->keputusan == 0 || $data->keputusan == 2): ?> style="display:none"
                            <?php endif; ?>>
                            <button class="btn btn-info mt-4">Generate PDF</button>
                            </a>
                        <?php else: ?>
                            <?php if($data->keputusan == 1): ?>
                                <a href="<?php echo e(route('user.newcustomer.acc', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" disabled>approve</button>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('user.newcustomer.acc', $data->id)); ?>">
                                    <button class="btn btn-success me-3 mt-4">approve</button>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('user.newcustomer.cancel', $data->id)); ?>">
                                <button class="btn btn-danger mt-4">cancel</button>
                            </a>
                            <a href="<?php echo e(route('user.export', $data->id)); ?>" <?php if($data->keputusan == 0 || $data->keputusan == 2): ?> style="display:none"
                                <?php endif; ?>>
                                <button class="btn btn-info ms-3 mt-4">Generate PDF</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/admin/detaildata.blade.php ENDPATH**/ ?>