<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <?php if(session('card-ok')): ?>
                <?php $__env->startComponent('back.components.alert'); ?>
                    <?php $__env->slot('type'); ?>
                        success
                    <?php $__env->endSlot(); ?>
                    <?php echo session('card-ok'); ?>

                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    <?php echo $__env->yieldContent('form-open'); ?>
                    <div class="box-body">
                        <div class="form-group <?php echo e($errors->has('number') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('Number Card'); ?></label>
                            <input type="text" class="form-control" id="number" name="number" value="<?php if(isset($card)): ?><?php echo e($card->number); ?><?php elseif(old('number')): ?><?php echo e(old('number')); ?><?php endif; ?>" placeholder="777 777 777 777" required> 
                            <?php echo $errors->first('number', '<small class="help-block">:message</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label for="type"><?php echo app('translator')->getFromJson('Type Card'); ?></label>
                            <select class="form-control" name="card_id" id="type_id">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($type->id); ?>" 
                                    <?php if(isset($card) && $card->card_id == $type->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>
                                   ><?php echo app('translator')->getFromJson( $type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user"><?php echo app('translator')->getFromJson('User'); ?></label>
                            <select class="form-control" name="user_id" id="user_id">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($user->id); ?>"
                                    <?php if(isset($card) && $card->user_id == $user->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>
                                   ><?php echo app('translator')->getFromJson( $user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('Submit'); ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-lessoncards-homework/resources/views/back/cards/template.blade.php ENDPATH**/ ?>