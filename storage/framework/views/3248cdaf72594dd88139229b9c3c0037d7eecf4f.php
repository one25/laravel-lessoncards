<?php $__env->startSection('css'); ?>
   <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<?php 
//print_r($types); 
//die;
?>

<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Select type of card</label>
            <select class="form-control input-size" style="height: auto;" name="type_id" id="type_id">
                <option value="0" class="input-size" 
                   >-----</option> 
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($type->id); ?>" class="input-size" 
                   ><?php echo app('translator')->getFromJson($type->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                         
            </select>
        </div>
    </div>
</div>   

<?php 
//print_r($cards); 
?>

<!-- brick-wrapper -->
<div class="bricks-wrapper">

    <div class="grid-sizer"></div>

    <div id="pannel">
       <?php echo $__env->make('front.brick-standard', compact('cards'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>   

</div>

</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
    <script>
       var url = "<?php echo e(route('home')); ?>";
       var errorAjax = '<?php echo app('translator')->getFromJson('Looks like there is a server issue...'); ?>';       
       $(document).ready(function(){
          $("select#type_id").change(function(){
             BaseRecord.typeSelect(this.value, url, errorAjax);
          });  
       });
    </script>
<?php $__env->stopSection(); ?>    

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-lessoncards-homework/resources/views/front/index.blade.php ENDPATH**/ ?>