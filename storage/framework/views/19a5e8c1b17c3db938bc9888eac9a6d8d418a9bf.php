<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<?php 
//print_r($user); 
?>

        <form method="post" action="<?php echo e(route('updateprofile')); ?>">
                              <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title text-bold">Update/remove profile</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
									    <?php if(session('user-updated')): ?>
									       <?php $__env->startComponent('back.components.alert'); ?>
									           <?php $__env->slot('type'); ?>
									               success
									           <?php $__env->endSlot(); ?>
									           <?php echo session('user-updated'); ?>

									       <?php echo $__env->renderComponent(); ?>
									    <?php endif; ?>                                   
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="<?php if(old('name')): ?><?php echo e(old('name')); ?><?php else: ?><?php echo e(auth()->user()->name); ?><?php endif; ?>" class="form-control f-verify input-size" />
                                            <?php echo $errors->first('name', '<small class="help-block red">:message</small>'); ?>

				                            </span>		
                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="form-group">
                                            <label>Email(Login)</label>
                                            <input type="text" name="email" value="<?php if(old('email')): ?><?php echo e(old('email')); ?><?php else: ?><?php echo e(auth()->user()->email); ?><?php endif; ?>" class="form-control f-verify input-size" />
                                            <?php echo $errors->first('email', '<small class="help-block red">:message</small>'); ?>

                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="form-group">
                                            <label>New password(if you need)</label>
                                            <input type="password" name="password" value="" class="form-control f-verify input-size" /> 
                                            <?php echo $errors->first('password', '<small class="help-block red">:message</small>'); ?>

                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="form-group">
                                            <label>New password(repeat)</label>
                                            <input type="password" name="password_confirmation" value="" class="form-control f-verify input-size" />
                                            <?php echo $errors->first('password_confirmation', '<small class="help-block red">:message</small>'); ?>

                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>
                            </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button class="btn btn-success input-size">Save</button>                
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            </div>
                        </div>
                        </form>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button type="button" class="btn btn-danger input-size">Remove</button>
        <form method="post" action="<?php echo e(route('destroyprofile')); ?>" name="form_destroy" style="display: none;">
                              <?php echo e(csrf_field()); ?>    
        </form>  
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
    <script>
       var swalTitle = '<?php echo app('translator')->getFromJson('Really destroy user ?'); ?>';
       var confirmButtonText = '<?php echo app('translator')->getFromJson('Yes'); ?>';
       var cancelButtonText = '<?php echo app('translator')->getFromJson('No'); ?>';     
       $(document).ready(function(){
          $(".btn.btn-danger").click(function(){
             //form_destroy.submit(); 
             BaseRecord.userdestroy(swalTitle, confirmButtonText, cancelButtonText);
          }); 
       });
    </script>
<?php $__env->stopSection(); ?>    

<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-lessoncards-homework/resources/views/back/profile/edit.blade.php ENDPATH**/ ?>