<?php $__env->startSection('content'); ?>
<div class="action-bar top">
    
    <div>
        <?php echo e($topics->render()); ?>

        <div class="clear"></div>
    </div>
</div>
<?php if(count($topics) == 0): ?>
<li><h4>We have nothing to show yet. Be the first one to <a href="<?php echo e(route('topic.create')); ?>">create a topic</a> and get this rolling!</h4></li>
<?php else: ?>






<div class="scrolling-pagination">

<?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="container">
	<div class="row">
		<h2></h2>
	</div>
    <div class="qa-message-list" id="wallmessages">
    				<div class="message-item" id="m16">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div >
									<span>
										<?php echo e($topic->last_post->created_at->format('d M Y, H:i')); ?><br />
										
									</span>
								</div>
								<div class="avatar pull-left" style="display: inline-flex"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img src="<?php echo e($topic->creator->profile_small_picture_url); ?>" / style="border-radius: 50%"> <span><h5 class="handle" style="margin-left: 7px;"> <a href="<?php echo e(route('profile', $topic->creator->id)); ?>"><?php echo e($topic->creator->user_name); ?></a></h5> <br>  </span></a></div>
								<div >
									<span>
										<?php echo e($topic->last_post->created_at->format('d M Y, H:i')); ?><br />
										
									</span>
								</div>
								<div class="user-detail">
									<?php if(count($topic->posts) > 0): ?>
									
							<?php endif; ?>
									
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"></span>
											<span class="qa-message-when">
												
                                                
                                                        
                                                 
											</span>
											<span class="qa-message-who">
                                                <div class="row">
                                                    
                                                </div>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								<a href="<?php echo e(route('topic', $topic->id)); ?>" class="forumtitle"><?php echo e($topic->title); ?></a>
                            </div>
                    	</div>
					</div>
    </div>
 </div>


 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php endif; ?>
<?php echo $__env->make('modules.footer-stats', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>