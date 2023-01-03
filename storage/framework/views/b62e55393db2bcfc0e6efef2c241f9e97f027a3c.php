

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Users Management</h5>
                        <p class="card-category">Silakan tambah user</p>
                    </div>
                    <div class="card-body">
                        <?php echo e(Form::open(['url' => route('user.store'),'class'=>'form-horizontal'])); ?>

                        <?php echo $__env->make('validation_error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('users.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::close()); ?>

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
    'elementActive' => 'user'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/users/create.blade.php ENDPATH**/ ?>