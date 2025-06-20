<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $settings = Utility::settings();

?>
<?php $__env->startPush('custom-scripts'); ?>
<?php if($settings['recaptcha_module'] == 'on'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php if($settings['cust_darklayout'] == 'on'): ?>
    <style>
        .g-recaptcha {
            filter: invert(1) hue-rotate(180deg) !important;
        }
    </style>
<?php endif; ?>

<?php
    $languages = App\Models\Utility::languages();
?>



<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600"><?php echo e(__('Login')); ?></h2>
        </div>
        <?php if(session('status')): ?>
        <div class="mb-4 font-medium text-lg text-green-600 text-danger">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
        <?php echo e(Form::open(['route' => 'login', 'method' => 'post', 'id' => 'loginForm', 'class' => 'login-form'])); ?>

        <div class="custom-login-form">
            <div class="form-group mb-3">
                <label class="form-label"><?php echo e(__('Email')); ?></label>
                <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')])); ?>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-email text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-3">
                <label class="form-label"><?php echo e(__('Password')); ?></label>
                <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Your Password'), 'id' => 'input-password'])); ?>

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-password text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between">

                    <?php if(Route::has('password.request')): ?>
                        <span><a href="<?php echo e(route('password.request' , $lang)); ?>"
                                tabindex="0"><?php echo e(__('Forgot your password?')); ?></a></span>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($settings['recaptcha_module'] == 'on'): ?>
                <div class="form-group col-lg-12 col-md-12 mt-3">
                    <?php echo NoCaptcha::display(); ?>

                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="small text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            <?php endif; ?>

            <div class="d-grid">
                <?php echo e(Form::submit(__('Login'), ['class' => 'btn btn-primary mt-2', 'id' => 'saveBtn'])); ?>

            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Portfolio\Azure Vm\ERP\resources\views/auth/login.blade.php ENDPATH**/ ?>