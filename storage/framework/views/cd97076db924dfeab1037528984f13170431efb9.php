<?php $__env->startSection('title', 'Data Peminjam'); ?>

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
    <h3>Data Peminjam Baru</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">Data Peminjam Baru</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Peminjam Baru</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal Input</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Pembiayaan</th>
                                        <th>Tanggal Keputusan</th>
                                        <th>Keputusan</th>
                                        <th>Url PDF</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $newcustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->tanggal_input); ?></td>
                                            <td><?php echo e($data->nik); ?></td>
                                            <td><?php echo e($data->nama); ?></td>
                                            <td><?php echo e($data->pembiayaan); ?></td>
                                            <td><?php echo e($data->tanggal_keputusan); ?></td>
                                            <td>
                                                <?php if($data->keputusan == 0): ?>
                                                    Belum Ada Keputusan
                                                <?php elseif($data->keputusan == 1): ?>
                                                    Disetujui
                                                <?php else: ?>
                                                    Tidak Disetujui
                                                <?php endif; ?>
                                            </td>
                                            <td><a href="<?php echo e($data->url_pdf); ?>"><?php echo e($data->url_pdf); ?></a></td>

                                            <?php if(auth()->user()->role == 'admin'): ?>
                                                <td class="col">
                                                    <a href="<?php echo e(route('admin.detaildata', $data->id)); ?>">
                                                        <button class="btn btn-primary w-100">
                                                            <i class="fa fa-info"></i><br>Detail
                                                        </button>
                                                    </a>
                                                    <a id="archive" data-id="<?php echo e($data->id); ?>">
                                                        <button class="btn btn-primary w-100 mt-3">
                                                            <i class="fa fa-save"></i><br>Archieve
                                                        </button>
                                                    </a>
                                                </td>
                                            <?php else: ?>
                                                <td class="col">
                                                    <a href="<?php echo e(route('user.detaildata', $data->id)); ?>">
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-info"></i><br>Detail
                                                        </button>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
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
    <script type="text/javascript">
        var SweetAlert_custom = {
            init: function() {
                document.getElementById('archive').onclick = function() {
                    let id = document.getElementById('archive').getAttribute('data-id');
                    swal({
                            title: "Apakah anda yakin?",
                            text: "Anda akan mengarsipkan data",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal("Data berhasil diarsipkan", {
                                    icon: "success"
                                }).then(function() {
                                    window.location.href = "archieve" + id;
                                });
                            } else {
                                swal("Data tidak diarsipkan");
                            }
                        });
                };
            }
        };
        (function($) {
            SweetAlert_custom.init()
        })(jQuery);
    </script>
    <script src="<?php echo e(asset('assets/js')); ?>/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo e(asset('assets/js')); ?>/script.js"></script>
    <script src="<?php echo e(asset('assets/js')); ?>/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/admin/newcustomer.blade.php ENDPATH**/ ?>