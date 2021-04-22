<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
<!-- Initialize the editor. -->
<script>
$(function() {
    initWYSIWYG('textarea');
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="post has-profile bg2">
    <div class="inner">
        <dl class="postprofile">
            <dt class="has-profile-rank has-avatar">
                <div class="avatar-container">
                    <a href="<?php echo e(route('profile', $topic->creator->id)); ?>" class="avatar"><img class="avatar" src="<?php echo e($topic->creator->profile_picture_url); ?>" alt="Profile picture" width="80" height="80"></a>
                </div>
                <a href="<?php echo e(route('profile', $topic->creator->id)); ?>" class="username-coloured"><?php echo e($topic->creator->user_name); ?></a>
            </dt>
            <dd class="profile-posts"><strong>Topics:</strong> <a href="<?php echo e(route('profile.topics', $topic->creator->id)); ?>"><?php echo e(count($topic->creator->topics)); ?></a></dd>
            <dd class="profile-posts"><strong>Posts:</strong> <a href="<?php echo e(route('profile.posts', $topic->creator->id)); ?>"><?php echo e(count($topic->creator->posts)); ?></a></dd>
            <dd class="profile-joined"><strong>Joined:</strong> <?php echo e($topic->creator->created_at->diffForHumans()); ?></dd>
        </dl>
        <div class="postbody">
            <div>
                <h3 class="first"><?php echo e($topic->title); ?></h3>
                <p class="author">
                    by <strong><a href="<?php echo e(route('profile', $topic->creator->id)); ?>" class="username-coloured"><?php echo e($topic->creator->user_name); ?></a></strong> » <?php echo e($topic->created_at->format('d M Y, H:i')); ?>

                </p>
                <div class="content"><?php echo $topic->description; ?></div>
                <?php if(!empty($topic->creator->signature)): ?>
                <div class="signature"><?php echo e($topic->creator->signature); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div>
    <?php if(empty($_user)): ?>
    <a href="<?php echo e(route('login')); ?>?redirectTo=<?php echo e(urlencode(route('topic', $topic->id))); ?>" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    <?php else: ?>
    <a href="#reply-post" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    <?php endif; ?>
    <?php echo e($posts->render()); ?>

    <div class="clear"></div>
</div>
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="post-<?php echo e($post->id); ?>" class="post has-profile bg2">
    <div class="inner">
        <dl class="postprofile">
            <dt class="has-profile-rank has-avatar">
                <div class="avatar-container">
                    <a href="<?php echo e(route('profile', $post->author->id)); ?>" class="avatar"><img class="avatar" src="<?php echo e($post->author->profile_picture_url); ?>" alt="Profile picture" width="80" height="80"></a>
                </div>
                <a href="<?php echo e(route('profile', $post->author->id)); ?>" class="username-coloured"><?php echo e($post->author->user_name); ?></a>
            </dt>
            <dd class="profile-posts"><strong>Topics:</strong> <a href="<?php echo e(route('profile.topics', $post->author->id)); ?>"><?php echo e(count($post->author->topics)); ?></a></dd>
            <dd class="profile-posts"><strong>Posts:</strong> <a href="<?php echo e(route('profile.posts', $post->author->id)); ?>"><?php echo e(count($post->author->posts)); ?></a></dd>
            <dd class="profile-joined"><strong>Joined:</strong> <?php echo e($post->author->created_at->diffForHumans()); ?></dd>
        </dl>
        <div class="postbody">
            <div>
                <div class="content topic-post"><?php echo $post->post; ?></div>
                <div class="signature">
                    <?php echo e($post->author->signature); ?><br />
                    by <strong><a href="<?php echo e(route('profile', $post->author->id)); ?>" class="username-coloured"><?php echo e($post->author->user_name); ?></a></strong> » <?php echo e($post->created_at->format('d M Y, H:i')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(count($posts) > 0): ?>
<div>
    <?php if(empty($_user)): ?>
    <a href="<?php echo e(route('login')); ?>" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    <?php else: ?>
    <a href="#reply-post" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    <?php endif; ?>
    <?php echo e($posts->render()); ?>

    <div class="clear"></div>
</div>
<?php endif; ?>
<?php if(!empty($_user)): ?>
<a id="reply-post"></a>
<div class="post bg2">
    <div class="inner">
        <h4>Reply to this topic</h4>
        <form method="POST" action="<?php echo e(route('post.create')); ?>">
            <?php echo e(csrf_field()); ?>

            <textarea name="post"></textarea>
            <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>" />
            <input type="submit" name="submit" id="submit" value="Submit" class="button1 default-submit-action" />
        </form>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>