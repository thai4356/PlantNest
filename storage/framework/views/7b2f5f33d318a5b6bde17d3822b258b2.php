<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Show plant')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div style="margin-left: 20%">
        <?php $total=0 ?>
        <?php $__currentLoopData = (array)session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant_id=>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $total += $plant_id * $details['quantity'] ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        Shopping Cart :
            <span>
                Amount: <?php echo e(count((array) session('cart'))); ?>

                Total: $<?php echo e($total); ?>


            </span>
            <span>

            </span>
    </div>

    <div class="py-12">
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success','data' => ['style' => 'margin-left: 10%','class' => 'mb-4','status' => session('message')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'margin-left: 10%','class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('message'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">STT</th>
                        
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >ID</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Name</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Description</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Price</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Image</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Category Id</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"><?php echo e(++$i); ?></th>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><?php echo e($plant->id); ?></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><?php echo e($plant->name); ?></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><?php echo e($plant->description); ?></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><?php echo e($plant->price); ?></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><img src=" storage/images/<?php echo e($plant->image); ?>"  width="100px"></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><?php echo e($plant->category_id); ?></td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                <a href="<?php echo e(url('/edit-plant/'.$plant->id)); ?>" class="btn-btn-primary" style="color: #2563eb">
                                    Edit
                                </a>
                            </td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800" style="color: #25eb2f">
                                <a href="<?php echo e(route('add_to_cart',$plant->id)); ?>" class="btn-btn-primary" style="color: #25eb2f">
                                    <div>Add to cart</div>

                                </a>
                            </td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800" >

                                <form action="<?php echo e(url('delete-plant/'.$plant->id)); ?> " method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button style="color: red"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6">Nothing yet !?</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($plants->links()); ?>


        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\PlantNest\resources\views/plant/index.blade.php ENDPATH**/ ?>