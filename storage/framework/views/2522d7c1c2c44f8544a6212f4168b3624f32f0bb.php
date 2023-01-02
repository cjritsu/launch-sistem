<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Pengajuan Surat Cuti</h5>
                        <p class="card-category">Surat cuti yang telah diterima/ditolak, tidak dapat diubah lagi</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="<?php echo e(route('surat_cuti.create')); ?>" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Cuti</a>
                            </div>
                            <div class="col-6 text-right">
                                <form action="<?php echo e(route('cuti_search')); ?>" method="GET">
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
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Pengambilan Cuti</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Hari Terpakai</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pengajuanCuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanCutis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(auth()->user()->id == $pengajuanCutis->user_id): ?>
                                            <tr>
                                                <td><?php echo e($pengajuanCutis->created_at); ?></td>
                                                <td><?php echo e($pengajuanCutis->Jenis_cuti->name); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($pengajuanCutis->tanggal_mulai)->isoFormat('D MMMM Y')); ?> <?php echo e(' — '); ?> <?php echo e(\Carbon\Carbon::parse($pengajuanCutis->tanggal_akhir)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($pengajuanCutis->tanggal_masuk)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e($pengajuanCutis->keterangan); ?></td>
                                                <td class="text-center"><?php echo e($pengajuanCutis->num_days); ?></td>
                                                <?php if($pengajuanCutis->status_kp == '2' && $pengajuanCutis->status_hrd == '2' && $pengajuanCutis->status_rek == '2'): ?>
                                                    <td><span class="badge badge-success"><?php echo e('Diterima'); ?></span></td>
                                                <?php elseif($pengajuanCutis->status_kp == '3' || $pengajuanCutis->status_hrd == '3' || $pengajuanCutis->status_rek == '3'): ?>
                                                    <td><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></td>
                                                <?php else: ?>
                                                    <td><span class="badge badge-warning"><?php echo e('Pending'); ?></span></td>
                                                <?php endif; ?>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="surat_cuti/<?php echo e($pengajuanCutis->id); ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> &nbsp;
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-surat')): ?>
                                                            <?php if($pengajuanCutis->status_kp != '1'): ?>

                                                            <?php else: ?>
                                                                <a href="surat_cuti/<?php echo e($pengajuanCutis->id); ?>/edit" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
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
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Days</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pengajuanCuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanCutis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($pengajuanCutis->User->nip); ?></td>
                                            <td><?php echo e($pengajuanCutis->User->name); ?></td>
                                            <td><?php echo e($pengajuanCutis->Unit_Kerja->name); ?></td>
                                            <td><?php echo e($pengajuanCutis->Jenis_cuti->name); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($pengajuanCutis->tanggal_mulai)->isoFormat('D MMMM Y')); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($pengajuanCutis->tanggal_akhir)->isoFormat('D MMMM Y')); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($pengajuanCutis->tanggal_masuk)->isoFormat('D MMMM Y')); ?></td>
                                            <td><?php echo e($pengajuanCutis->keterangan); ?></td>
                                            <td><?php echo e($pengajuanCutis->num_days); ?></td>
                                            <?php if($pengajuanCutis->status_kp == '2' && $pengajuanCutis->status_hrd == '2' && $pengajuanCutis->status_rek == '2'): ?>
                                                    <td><span class="badge badge-success"><?php echo e('Diterima'); ?></span></td>
                                            <?php elseif($pengajuanCutis->status_kp == '3' || $pengajuanCutis->status_hrd == '3' || $pengajuanCutis->status_rek == '3'): ?>
                                                <td><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></td>
                                            <?php else: ?>
                                                <td><span class="badge badge-warning"><?php echo e('Pending'); ?></span></td>
                                            <?php endif; ?>
                                            <td>
                                                <div class="dropdown text-center">
                                                    <a class="dropdown-button" id="dropdown-menu-<?php echo e($pengajuanCutis->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-<?php echo e($pengajuanCutis->id); ?>">
                                                        <a href="surat_cuti/<?php echo e($pengajuanCutis->id); ?>" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>View</a>
                                                        <a href="surat_cuti/<?php echo e($pengajuanCutis->id); ?>/edit" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                        <?php echo e(link_to('', 'Delete', ['class'=>'dropdown-item', 'onclick'=>"event.preventDefault();document.getElementById('delete-form-$pengajuanCutis->id').submit();"])); ?>

                                                        <form id="delete-form-<?php echo e($pengajuanCutis->id); ?>" action="<?php echo e(route('surat_cuti.destroy', $pengajuanCutis,  ['id' => $pengajuanCutis->id])); ?>" method="POST" style="display: none;">
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

                        <div class="d-flex justify-content-center">
                            <?php echo e($pengajuanCuti->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
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
    'elementActive' => 'cuti'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_cuti/index.blade.php ENDPATH**/ ?>