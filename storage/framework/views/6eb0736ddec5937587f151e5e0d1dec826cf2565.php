<?php $__env->startSection('title', 'Login Passed'); ?>

<?php $__env->startSection('content'); ?>
<br/>
<h2>Login Passed</h2>


    <?php if($model->getUserName() == 'hollandaucoin'): ?>
    	<h4>Welcome Back Holland</h4>
    <?php else: ?>
    	<h4>Welcome New User</h4>
    <?php endif; ?>

<input type="submit" formaction="login" class="btn btn-primary" value="Try Again">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/activity5/resources/views/loginPassed.blade.php ENDPATH**/ ?>