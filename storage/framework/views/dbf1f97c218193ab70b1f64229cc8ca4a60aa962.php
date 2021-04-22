<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('login')); ?>" method="post" id="login">
    
    <?php echo e(csrf_field()); ?>

    <?php if(!empty(app('request')->input('redirectTo'))): ?>
    <input type="hidden" name="redirectTo" value="<?php echo e(urldecode(app('request')->input('redirectTo'))); ?>" />
    <?php endif; ?>
    <div class="signin">
        <div></div>
        <h1>Sign in</h1><br>

        
        
        <label for="uname"></label>

        <input type="text" placeholder="Email" name="uname" value="<?php echo e(old('email')); ?>" required><br>
        <?php if($errors->has('email')): ?>
                            <br /><span class="error"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        

        <label for="psw"><b></b></label>
        <input type="password" placeholder="Password" name="psw" required>
        <p><dd><a href="<?php echo e(route('password.request')); ?>">I forgot my password</a></dd></p>
        <?php if($errors->has('password')): ?>
        <br /><span class="error"><?php echo e($errors->first('password')); ?></span>
        <?php endif; ?>
        <dl>
            <dd><label for="autologin"><input type="checkbox" name="remember" id="autologin"  <?php echo e(old('remember') | true ? 'checked' : ''); ?> /> Remember me</label></dd>
            
             
        </dl>
        <dl>
            <dt>&nbsp;</dt>
            <dd><input type="submit" name="login" value="Login" class="button1" /></dd>
        </dl>
        <button type="submit" name="login" value="Login" class="loginbtn">Sign Up</button>

    </div>
    <div class="friends">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start</p>
        <p>journey with us</p><br>
        <button class="loginbtn">SIGN UP</button>

    </div>
    </div>
    
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>