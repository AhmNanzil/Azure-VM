<?php
$profile=\App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Profile Account')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,
        })
        $(".list-group-item").click(function(){
            $('.list-group-item').filter(function(){
                return this.href == id;
            }).parent().removeClass('text-primary');
        });
    </script>

<script>
    document.getElementById('avatar').onchange = function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('image').src = src
    }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Profile')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3">
            <div class="card sticky-top" style="top:30px">
                <div class="list-group list-group-flush" id="useradd-sidenav">
                    <a href="#personal_info" class="list-group-item list-group-item-action border-0"><?php echo e(__('Personal Info')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    <a href="#change_password" class="list-group-item list-group-item-action border-0"><?php echo e(__('Change Password')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="personal_info" class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Personal Info')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo e(Form::model($userDetail,array('route' => array('update.account'), 'method' => 'post', 'enctype' => "multipart/form-data"))); ?>

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label text-dark"><?php echo e(__('Name')); ?></label>
                                    <input class="form-control" name="name" type="text" id="name" placeholder="<?php echo e(__('Enter Your Name')); ?>" value="<?php echo e($userDetail->name); ?>" required autocomplete="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-dark"><?php echo e(__('Email')); ?></label>
                                    <input class="form-control" name="email" type="text" id="email" placeholder="<?php echo e(__('Enter Your Email Address')); ?>" value="<?php echo e($userDetail->email); ?>" required autocomplete="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="theme-avtar-logo mt-4">
                                        <img id="image" src="<?php echo e(($userDetail->avatar) ? $profile  . $userDetail->avatar : $profile . 'avatar.png'); ?>"
                                             class="big-logo">
                                    </div>
                                    <div class="choose-files mt-3">
                                        <label for="avatar">
                                            <div class=" bg-primary profile_update"> <i class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?></div>
                                            <input type="file" class="form-control file" name="profile" id="avatar" data-filename="profile_update">
                                        </label>
                                    </div>
                                    <span class="text-xs text-muted"><?php echo e(__('Please upload a valid image file. Size of image should not be more than 2MB.')); ?></span>
                                </div>

                            </div>
                            <div class="col-lg-12 text-end">
                                <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-print-invoice  btn-primary m-r-10">
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <div id="change_password" class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Change Password')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('update.password')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 form-group">
                                <label for="old_password" class="col-form-label text-dark"><?php echo e(__('Old Password')); ?></label>
                                <input class="form-control" name="old_password" type="password" id="old_password" required autocomplete="old_password" placeholder="<?php echo e(__('Enter Old Password')); ?>">
                            </div>

                            <div class="col-lg-6 col-sm-6 form-group">
                                <label for="password" class="col-form-label text-dark"><?php echo e(__('Password')); ?></label>
                                <input class="form-control" name="password" type="password" required autocomplete="new-password" id="password" placeholder="<?php echo e(__('Enter Your New Password')); ?>">
                            </div>
                            <div class="col-lg-6 col-sm-6 form-group">
                                <label for="password_confirmation" class="col-form-label text-dark"><?php echo e(__('New Confirm Password')); ?></label>
                                <input class="form-control" name="password_confirmation" type="password" required autocomplete="new-password" id="password_confirmation" placeholder="<?php echo e(__('Enter Your Confirm Password')); ?>">
                            </div>
                            <div class="col-lg-12 text-end">
                                <input type="submit" value="<?php echo e(__('Change Password')); ?>" class="btn btn-print-invoice  btn-primary m-r-10">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Test Case\Aws-CI-CD-DevOps\ERP\resources\views/user/profile.blade.php ENDPATH**/ ?>