<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                      <?php if(session('card-updated')): ?>
                          <?php $__env->startComponent('back.components.alert'); ?>
                              <?php $__env->slot('type'); ?>
                                  success
                              <?php $__env->endSlot(); ?>
                              <?php echo session('card-updated'); ?>

                          <?php echo $__env->renderComponent(); ?>
                      <?php endif; ?>
                      <table>
                         <thead>
                          <tr>
                            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <?php endif; ?>
                            <td>User Name</td>
                            <td>Card Number</td>                            
                            <td>Card Name</td>
                            <td>Card Type</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('back.brick-standard', compact('cards'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         </tbody>    
                       </table>
                     </div>
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
    <script>
       var url = "<?php echo e(route('dashboard')); ?>"; 
       var errorAjax = '<?php echo app('translator')->getFromJson('Looks like there is a server issue...'); ?>';
       var swalTitle = '<?php echo app('translator')->getFromJson('Really destroy card ?'); ?>';
       var confirmButtonText = '<?php echo app('translator')->getFromJson('Yes'); ?>';
       var cancelButtonText = '<?php echo app('translator')->getFromJson('No'); ?>';        
       $(document).ready(function(){
         $(".listbuttonremove").click(function(){
            BaseRecord.destroy(this, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax);
            return false;
         });
       });
    </script>
<?php $__env->stopSection(); ?>    

<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-lessoncards-homework/resources/views/back/index.blade.php ENDPATH**/ ?>