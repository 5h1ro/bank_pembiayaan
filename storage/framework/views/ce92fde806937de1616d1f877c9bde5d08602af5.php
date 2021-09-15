<?php $__env->startSection('title', 'Datai Data Peminjam'); ?>

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
    <li class="breadcrumb-item active">Detail Data Peminjam</li>
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
                                        <th>Tanggal Input</th>
                                        <th><?php echo e($data->tanggal_input); ?></th>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <th><?php echo e($data->nik); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nopen</th>
                                        <th><?php echo e($data->nopen); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th><?php echo e($data->nama); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <th><?php echo e($data->tanggal_lahir); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jalan</th>
                                        <th><?php echo e($data->alamat_jalan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <th><?php echo e($data->alamat_kec); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Kota/Kabupaten</th>
                                        <th><?php echo e($data->alamat_kotakab); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <th><?php echo e($data->alamat_propinsi); ?></th>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <th><?php echo e($data->telepon); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Pembiayaan</th>
                                        <th>Rp <?php echo e(number_format($data->pembiayaan, 0, ',', '.')); ?>,-</th>
                                    </tr>
                                    <tr>
                                        <th>Tenor</th>
                                        <th><?php echo e($data->tenor); ?> Bulan</th>
                                    </tr>
                                    <tr>
                                        <th>Cicilan</th>
                                        <th>Rp <?php echo e(number_format($data->cicilan, 0, ',', '.')); ?>,-</th>
                                    </tr>
                                    <tr>
                                        <th>Gaji Pokok</th>
                                        <th>Rp <?php echo e(number_format($data->gaji_pokok, 0, ',', '.')); ?>,-</th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>
                                            <?php if($data->keputusan_bank == 0): ?>
                                                Belum Ada Keputusan
                                            <?php elseif($data->keputusan_bank == 1): ?>
                                                Disetujui
                                            <?php else: ?>
                                                Tidak Disetujui
                                            <?php endif; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url KTP</th>
                                        <th><a href="<?php echo e($data->url_ktp); ?>"></a><?php echo e($data->url_ktp); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Url KK</th>
                                        <th><a href="<?php echo e($data->url_kk); ?>"></a><?php echo e($data->url_kk); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Url karip</th>
                                        <th><a href="<?php echo e($data->url_karip); ?>"></a><?php echo e($data->url_karip); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Url SK Pensiun</th>
                                        <th><a href="<?php echo e($data->url_sk_pensiun); ?>"></a><?php echo e($data->url_sk_pensiun); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Url Video Interview</th>
                                        <th><a
                                                href="<?php echo e($data->url_video_interview); ?>"></a><?php echo e($data->url_video_interview); ?>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url Video Kesehatan</th>
                                        <th><a
                                                href="<?php echo e($data->url_video_kesehatan); ?>"></a><?php echo e($data->url_video_kesehatan); ?>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Keputusan</th>
                                        <th><?php echo e($data->tanggal_keputusan); ?></th>
                                    </tr>
                                    <tr>
                                        <th>Keputusan Bank</th>
                                        <th>
                                            <?php if($data->keputusan_bank == 0): ?>
                                                Belum Ada Keputusan
                                            <?php elseif($data->keputusan_bank == 1): ?>
                                                Disetujui
                                            <?php else: ?>
                                                Tidak Disetujui
                                            <?php endif; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Keputusan Asuransi</th>
                                        <th>
                                            <?php if($data->keputusan_asuransi == 0): ?>
                                                Belum Ada Keputusan
                                            <?php elseif($data->keputusan_asuransi == 1): ?>
                                                Disetujui
                                            <?php else: ?>
                                                Tidak Disetujui
                                            <?php endif; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Url PDF</th>
                                        <th><a href="<?php echo e($data->url_pdf); ?>"></a><?php echo e($data->url_pdf); ?></th>
                                    </tr>
                                </thead>
                            </table>
                            <?php if(auth()->user()->role == 'admin'): ?>
                                <a href="<?php echo e(route('admin.export', $data->id)); ?>" <?php if($data->keputusan_bank == 0 || $data->keputusan_bank == 2): ?>
                                    style="display:none"
                            <?php endif; ?>>
                            <button class="btn btn-info mt-4">Generate PDF</button>
                            </a>
                        <?php else: ?>
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

                            <?php if($data->keputusan_bank == 1): ?>
                                <a id="approve" data-id="<?php echo e($data->id); ?>"
                                    href="<?php echo e(route('user.newcustomer.acc', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btnapprove" disabled>approve</button>
                                </a>
                                <a id="cancel" data-id="<?php echo e($data->id); ?>"
                                    data-id="<?php echo e(route('user.newcustomer.cancel', $data->id)); ?>">
                                    <button class="btn btn-dark me-3 mt-4" id="btncancel" disabled>cancel</button>
                                </a>
                                <a id="edit" onclick="enable()">
                                    <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                <?php elseif($data->keputusan_bank == 2): ?>
                                    
                                    <a id="approve" data-id="<?php echo e($data->id); ?>"
                                        href="<?php echo e(route('user.newcustomer.acc', $data->id)); ?>">
                                        <button class="btn btn-dark me-3 mt-4" id="btnapprove" disabled>approve</button>
                                    </a>
                                    <a id="cancel" data-id="<?php echo e($data->id); ?>"
                                        data-id="<?php echo e(route('user.newcustomer.cancel', $data->id)); ?>">
                                        <button class="btn btn-dark me-3 mt-4" id="btncancel" disabled>cancel</button>
                                    </a>
                                    <a id="edit" onclick="enable()">
                                        <button class="btn btn-warning mt-4" onclick="enable()">Edit</button>
                                    <?php else: ?>
                                        <a id="approve" data-id="<?php echo e($data->id); ?>">
                                            <button class="btn btn-success me-3 mt-4">approve</button>
                                        </a>
                                        <a id="cancel" data-id="<?php echo e($data->id); ?>">
                                            <button class="btn btn-danger mt-4">cancel</button>
                                        </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('user.export', $data->id)); ?>" <?php if($data->keputusan_bank == 0 || $data->keputusan_bank == 2): ?> style="display:none"
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/admin/detaildata.blade.php ENDPATH**/ ?>