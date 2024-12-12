<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-6">
                        <!-- Avatar sem borda arredondada (removido rounded-full) -->
                        <img src="<?php echo e(asset(auth()->user()->avatar)); ?>" alt="Avatar" class="w-20 h-20 border-4 border-[#6a0dad]">

                        <div class="space-y-4">
                            <p class="text-lg font-semibold text-[#6a0dad]">Nome: <?php echo e(auth()->user()->name); ?></p>
                            <p class="text-lg font-medium text-[#6a0dad]">Pontuação: <?php echo e(auth()->user()->pontuacao); ?></p>

                            <!-- Exibindo o Ranking -->
                            <p class="text-sm text-[#6a0dad]">
                                Ranking: 
                                <?php
                                    $ranking = auth()->user()->pontuacao > 0 
                                        ? \App\Models\User::orderByDesc('pontuacao')
                                            ->pluck('id')
                                            ->search(auth()->user()->id) + 1
                                        : '#';
                                ?>
                                <?php echo e($ranking); ?>

                            </p>
                        </div>
                    </div>

                    <!-- Botão que redireciona para o quiz -->
                    <div class="mt-6">
                        <a href="<?php echo e(route('quiz.index')); ?>" class="inline-block bg-[#6a0dad] text-white py-2 px-4 rounded-lg hover:bg-[#5a08a2] transition duration-300">
                            Iniciar Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\PWI\quiz\resources\views/dashboard.blade.php ENDPATH**/ ?>