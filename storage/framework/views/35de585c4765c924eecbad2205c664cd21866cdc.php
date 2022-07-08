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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Users')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6">
                    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex"><?php echo e(__('Update user')); ?></h1>
                    <a href="<?php echo e(route('user.index')); ?>" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400"><?php echo e(__('<< Back to all users')); ?></a>
                    <?php if($errors->any()): ?>
                        <ul class="mt-3 list-none list-inside text-sm text-red-400">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="w-full px-6 py-4 bg-white overflow-hidden">
                    <form method="POST" action="<?php echo e(route('user.update', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                        <div class="py-2">
                            <label for="name" class="block font-medium text-sm text-gray-700<?php echo e($errors->has('name') ? ' text-red-400' : ''); ?>"><?php echo e(__('Name')); ?></label>
                            <input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full<?php echo e($errors->has('name') ? ' border-red-400' : ''); ?>"
                                            type="text"
                                            name="name"
                                            value="<?php echo e(old('name', $user->name)); ?>"
                                            />
                        </div>
                        <div class="py-2">
                            <label for="email" class="block font-medium text-sm text-gray-700<?php echo e($errors->has('email') ? ' text-red-400' : ''); ?>"><?php echo e(__('Email')); ?></label>
                            <input id="email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full<?php echo e($errors->has('email') ? ' border-red-400' : ''); ?>"
                                            type="email"
                                            name="email"
                                            value="<?php echo e(old('email', $user->email)); ?>"
                                            />
                        </div>
                        <div class="py-2">
                            <label for="password" class="block font-medium text-sm text-gray-700<?php echo e($errors->has('password') ? ' text-red-400' : ''); ?>"><?php echo e(__('Password')); ?></label>
                            <input id="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full<?php echo e($errors->has('password') ? ' border-red-400' : ''); ?>"
                                            type="password"
                                            name="password"
                                            />
                        </div>
                        <div class="py-2">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700<?php echo e($errors->has('password') ? ' text-red-400' : ''); ?>"><?php echo e(__('Password Confirmation')); ?></label>
                            <input id="password_confirmation" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full<?php echo e($errors->has('password') ? ' border-red-400' : ''); ?>"
                                            type="password"
                                            name="password_confirmation"
                                            />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type='submit' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\My_Works\Laravel\LicenseManager\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>