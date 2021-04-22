<div class="col-12 col-sm-3 float-left profile-info">
    <img src="<?php echo e($user->profile_picture_url); ?>">
    <h3><a href="<?php echo e(route('profile', $user->id)); ?>"><?php echo e($user->user_name); ?></a></h3>
    <?php if(!empty($_user) && $_user->id == $user->id): ?>
    <a href="<?php echo e(route('profile.edit')); ?>" class="btn">[Edit profile]</a>
    <?php endif; ?>
</div>