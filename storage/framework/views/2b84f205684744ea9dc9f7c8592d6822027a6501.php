<?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="<?php echo e(route('cards.destroy', [$card->id])); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="<?php echo e(route('cards.edit', [$card->id])); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
<?php endif; ?>
   <td><?php echo e($card->user->name); ?></td>
   <td><?php echo e($card->number); ?></td>  
   <td><?php echo e($card->card->name); ?></td>   
   <td><?php echo e($card->card->type->name); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/alex/www/laravel-lessoncards-homework/resources/views/back/brick-standard.blade.php ENDPATH**/ ?>