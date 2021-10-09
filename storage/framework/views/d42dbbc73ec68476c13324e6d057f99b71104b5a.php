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
    <li class="breadcrumb-item active">Data Arsip</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Arsip</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggan Input</th>
                                        <th>NIK</th>
                                        <th>Nopen</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jalan</th>
                                        <th>Kecamatan</th>
                                        <th>Kota/Kabupaten</th>
                                        <th>Provinsi</th>
                                        <th>Telepon</th>
                                        <th>Pembiayaan</th>
                                        <th>Tenor</th>
                                        <th>Cicilan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Status</th>
                                        <th>Url KTP</th>
                                        <th>Url KK</th>
                                        <th>Url Karip</th>
                                        <th>Url SK Pensiun</th>
                                        <th>Url Video Interview</th>
                                        <th>Url Video Kesehatan</th>
                                        <th>Tanggal Keputusan</th>
                                        <th>Keputusan Bank</th>
                                        <th>Keputusan Asuransi</th>
                                        <th>Url PDF</th>
                                        <th>Tanggal Arsip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $archieve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->tanggal_input); ?></td>
                                            <td><?php echo e($data->nik); ?></td>
                                            <td><?php echo e($data->nopen); ?></td>
                                            <td><?php echo e($data->nama); ?></td>
                                            <td><?php echo e($data->tanggal_lahir); ?></td>
                                            <td><?php echo e($data->alamat_jalan); ?></td>
                                            <td><?php echo e($data->alamat_kec); ?></td>
                                            <td><?php echo e($data->alamat_kotakab); ?></td>
                                            <td><?php echo e($data->alamat_propinsi); ?></td>
                                            <td><?php echo e($data->telepon); ?></td>
                                            <td>Rp <?php echo e(number_format($data->pembiayaan, 0, ',', '.')); ?>,-</td>
                                            <td><?php echo e($data->tenor); ?> Bulan</td>
                                            <td>Rp <?php echo e(number_format($data->cicilan, 0, ',', '.')); ?>,-</td>
                                            <td>Rp <?php echo e(number_format($data->gaji_pokok, 0, ',', '.')); ?>,-</td>
                                            <td><?php echo e($data->status); ?></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_ktp); ?>">KTP</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_kk); ?>">KK</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_karip); ?>">Karip</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_sk_pensiun); ?>">SK Pensiun</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_video_interview); ?>">Video Interview</a></td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_video_kesehatan); ?>">Video Kesehatan</a></td>
                                            <td><?php echo e($data->tanggal_keputusan); ?></td>
                                            <td>
                                                <?php if($data->keputusan_bank == 0): ?>
                                                    Belum Ada Keputusan
                                                <?php elseif($data->keputusan_bank == 1): ?>
                                                    Disetujui
                                                <?php else: ?>
                                                    Tidak Disetujui
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($data->keputusan_asuransi == 0): ?>
                                                    Belum Ada Keputusan
                                                <?php elseif($data->keputusan_asuransi == 1): ?>
                                                    Disetujui
                                                <?php else: ?>
                                                    Tidak Disetujui
                                                <?php endif; ?>
                                            </td>
                                            <td><a class="btn btn-outline-info" target=" _blank"
                                                    href="<?php echo e($data->url_pdf); ?>">PDF</a></td>
                                            <td><?php echo e($data->tanggal_archieve); ?></td>
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiro/Code/PSB/resources/views/admin/archieve.blade.php ENDPATH**/ ?>