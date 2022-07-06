<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="pl-5 pr-5">
            <h5>
                Welcome, <?php echo e($user_email); ?> | Your Credit: <?php echo e($credit); ?> |  
                <a class="btn btn-success" href="<?php echo e(route('licenses.create')); ?>"> NEW</a>
            </h5>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="container mt-5 mb-5">
            <div class="flex flex-col mt-8">
            <!-- <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-5 mt-5 text-center">
                        <h2>Licenses</h2>
                    </div>
                    <div class="pull-right mb-2">
                    </div>
                </div>
            </div> -->
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
            <?php elseif($message = Session::get('no-credit')): ?>
            <div class="alert alert-danger">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <table class="table table-bordered text-center">
                <tr>
                    <th>Licenses</th>
                    <th width="80px">Action</th>
                </tr>
                <?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($license->license); ?></td>
                    <td>
                        <form action="<?php echo e(route('licenses.destroy',$license->id)); ?>" method="Post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <div class="py-8">
            <?php echo e($licenses->appends(request()->query())->links()); ?>

        </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\My_Works\Laravel\LicenseManager\resources\views/licenses/index.blade.php ENDPATH**/ ?>