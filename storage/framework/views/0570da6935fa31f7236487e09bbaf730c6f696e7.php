<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('register')); ?>" id="register">
    <?php echo e(csrf_field()); ?>

    <div class="panel">
        <div class="inner">
            <h2>Registration</h2>
            <fieldset class="fields2">
                <dl>
                    <dt><label for="first_name">First name:</label></dt>
                    <dd>
                        <input type="text" name="first_name" id="first_name" size="25" value="<?php echo e(old('first_name')); ?>" class="inputbox autowidth" title="First name" />
                        <?php if($errors->has('first_name')): ?>
                        <br /><span class="error"><?php echo e($errors->first('first_name')); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="last_name">Last name:</label></dt>
                    <dd>
                        <input type="text" name="last_name" id="last_name" size="25" value="<?php echo e(old('last_name')); ?>" class="inputbox autowidth" title="Last name" />
                        <?php if($errors->has('last_name')): ?>
                        <br /><span class="error"><?php echo e($errors->first('last_name')); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="user_name">User name:</label><br /><span>User name must be between 6 characters and 25 characters long and use only alphanumeric characters.</span></dt>
                    <dd>
                        <input type="text" name="user_name" id="user_name" size="25" maxlength="25" value="<?php echo e(old('user_name')); ?>" class="inputbox autowidth" title="User name" />
                        <?php if($errors->has('user_name')): ?>
                        <br /><span class="error"><?php echo e($errors->first('user_name')); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="email">Email address:</label></dt>
                    <dd>
                        <input type="email" name="email" id="email" size="25" maxlength="100" value="<?php echo e(old('email')); ?>" class="inputbox autowidth" title="Email address" autocomplete="off" />
                        <?php if($errors->has('email')): ?>
                        <br /><span class="error"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="password">Password:</label><br /><span>Must be between 6 characters and 100 characters.</span></dt>
                    <dd>
                        <input type="password" name="password" id="password" size="25" value="<?php echo e(old('password')); ?>" class="inputbox autowidth" title="Password" autocomplete="off" />
                        <?php if($errors->has('password')): ?>
                        <br /><span class="error"><?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="password_confirmation">Confirm password:</label></dt>
                    <dd>
                        <input type="password"  name="password_confirmation" id="password_confirmation" size="25" value="<?php echo e(old('password_confirmation')); ?>" class="inputbox autowidth" title="Confirm password" autocomplete="off" />
                        <?php if($errors->has('password_confirmation')): ?>
                        <br /><span class="error"><?php echo e($errors->first('password_confirmation')); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
            </fieldset>
        </div>
    </div>
    <div class="panel">
        <div class="inner">
            <fieldset class="submit-buttons">
                <input type="reset" value="Reset" name="reset" class="button2" />&nbsp;
                <input type="submit" name="submit" id="submit" value="Submit" class="button1 default-submit-action" />
            </fieldset>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>