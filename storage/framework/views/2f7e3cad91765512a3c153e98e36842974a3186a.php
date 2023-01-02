<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Pengajuan Surat Permohonan Izin</h5>
                        <p class="card-category">Mohon untuk mengajukan surat izin 2 Hari sebelum tanggal izin</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="<?php echo e(route('surat_izin.create')); ?>" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Surat</a>
                            </div>
                            <div class="col-6 text-right">
                                <form action="<?php echo e(route('izin_search')); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                    <div class="input-group no-border">
                                        <input type="text" value="<?php echo e(old('search')); ?>" class="form-control" placeholder="Search..." name="search">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="nc-icon nc-zoom-split"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br/>
                        <table class="table table-striped table-hover">
                            <?php if(auth()->user()->HasRole('Staff')): ?>
                                <thead>
                                    <tr>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jenis Izin</th>
                                        <th>Tanggal Yang Dimohon</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Hari yang Diambil</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pengajuanSurats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(auth()->user()->id == $pengajuanSurat->user_id): ?>
                                            <tr>
                                                <td><?php echo e($pengajuanSurat->created_at); ?></td>
                                                <td><?php echo e($pengajuanSurat->Jenis_Izin->name); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_izin_awal)->isoFormat('D MMMM Y')); ?> <?php echo e('—'); ?> <?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_izin_akhir)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_masuk)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e($pengajuanSurat->num_days); ?></td>
                                                <td><?php echo e($pengajuanSurat->keterangan); ?></td>
                                                <?php if($pengajuanSurat->status_kp == '2' && $pengajuanSurat->status_hrd == '2' && $pengajuanSurat->status_rek == '2'): ?>
                                                    <td><span class="badge badge-success"><?php echo e('Diterima'); ?></span></td>
                                                <?php elseif($pengajuanSurat->status_kp == '3' || $pengajuanSurat->status_hrd == '3' || $pengajuanSurat->status_rek == '3'): ?>
                                                    <td><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></td>
                                                <?php else: ?>
                                                    <td><span class="badge badge-warning"><?php echo e('Pending'); ?></span></td>
                                                <?php endif; ?>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="surat_izin/<?php echo e($pengajuanSurat->id); ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-surat')): ?>
                                                            <?php if($pengajuanSurat->status_kp != '1'): ?>

                                                            <?php else: ?>
                                                                <a href="surat_izin/<?php echo e($pengajuanSurat->id); ?>/edit" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php else: ?>
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Unit</th>
                                        <th>Jenis Izin</th>
                                        <th>Permintaan Izin</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Hari yang Diambil</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pengajuanSurats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($pengajuanSurat->User->nip); ?></td>
                                            <td><?php echo e($pengajuanSurat->User->name); ?></td>
                                            <td><?php echo e($pengajuanSurat->Unit_Kerja->name); ?></td>
                                            <td><?php echo e($pengajuanSurat->Jenis_Izin->name); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_izin_awal)->isoFormat('D MMMM Y')); ?> <?php echo e('—'); ?> <?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_izin_akhir)->isoFormat('D MMMM Y')); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_masuk)->isoFormat('D MMMM Y')); ?></td>
                                            <td><?php echo e($pengajuanSurat->num_days); ?></td>
                                            <td><?php echo e($pengajuanSurat->keterangan); ?></td>
                                            <?php if($pengajuanSurat->status_kp == '2' && $pengajuanSurat->status_hrd == '2' && $pengajuanSurat->status_rek == '2'): ?>
                                                    <td><span class="badge badge-success"><?php echo e('Diterima'); ?></span></td>
                                            <?php elseif($pengajuanSurat->status_kp == '3' || $pengajuanSurat->status_hrd == '3' || $pengajuanSurat->status_rek == '3'): ?>
                                                <td><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></td>
                                            <?php else: ?>
                                                <td><span class="badge badge-warning"><?php echo e('Pending'); ?></span></td>
                                            <?php endif; ?>
                                            <td>
                                                <div class="dropdown text-center">
                                                    <a class="dropdown-button" id="dropdown-menu-<?php echo e($pengajuanSurat->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-<?php echo e($pengajuanSurat->id); ?>">
                                                        <a href="surat_izin/<?php echo e($pengajuanSurat->id); ?>" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>View</a>

                                                        <a href="surat_izin/<?php echo e($pengajuanSurat->id); ?>/edit" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                        <?php echo e(link_to('', 'Delete', ['class'=>'dropdown-item', 'onclick'=>"event.preventDefault();document.getElementById('delete-form-$pengajuanSurat->id').submit();"])); ?>


                                                        <form id="delete-form-<?php echo e($pengajuanSurat->id); ?>" action="<?php echo e(route('surat_izin.destroy', $pengajuanSurat,  ['id' => $pengajuanSurat->id])); ?>" method="POST" style="display: none;">
                                                            <?php echo method_field('DELETE'); ?>
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#tanggal_mulai').datepicker({
            uiLibrary: 'bootstrap4'
        });
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'izin'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_izin/index.blade.php ENDPATH**/ ?>