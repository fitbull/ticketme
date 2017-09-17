<?php $__env->startSection('content'); ?>

<div class="panel panel-default">
             <div class="panel-heading" style="background: #DCDCDC">
            <div class="row">
                <div class="col-md-6">
                    <h4><?php echo e($ticket->subject); ?></h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                  <?php if($ticket->status == 'pending'): ?>
                     <a href="/close/<?php echo e($ticket->id); ?>" class="btn btn-success">Mark Complete</a>
                  <?php else: ?>
                     <a href="/open/<?php echo e($ticket->id); ?>" class="btn btn-default">Mark Pending</a>
                    <?php endif; ?>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
                     <a href="/delete/<?php echo e($ticket->id); ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
          </div>

          <div class="panel-body">
             <div class="panel-body" style="background: #DCDCDC">
             	<div class="row" style="padding: 25px">
             		<div class="col-md-6">
             			<b>Owner</b>	: <?php echo e($ticket->user->name); ?><br/>
             			<b>Status</b>	: <?php echo e($ticket->status); ?><br/>
             			<b>Priority</b>	: <?php echo e($ticket->priority); ?><br/>
             		</div>
             		<div class="col-md-6">
             			<b>Category</b>	: <?php echo e($ticket->category->name); ?><br/>
             			<b>Created</b>	: <?php echo e($ticket->created_at); ?><br/>
             			<b>Last Update</b>	: <?php echo e($ticket->updated_at); ?><br/>
             		</div>
             	</div>
             </div>
             <div style="padding: 25px">
             <b>Decription</b><br/>
             <?php echo e($ticket->description); ?>

		</div>
          </div>
        </div> 
      <br/>
      <h3> Comment</h3>

      <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="panel panel-default">
             <div class="panel-heading" style="background: #DCDCDC">
            <div class="row">
                <div class="col-md-6">
                    <b><?php echo e($comment->user->name); ?></b>
                </div>
                <div class="col-md-6" style="text-align: right">
                    <?php echo e($comment->created_at); ?>

                </div>
            </div>
          </div>
          <div class="panel-body">
             <?php echo e($comment->body); ?>

        </div> 
 </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <div class="panel panel-default">
             <div class="panel-heading">
                    <h4>Reply</h4>
          </div>
          <div class="panel-body">
  <form action="<?php echo e(url('/add/comment')); ?>" id="comment" method="post">
  <div class="form-group">
   <textarea class="form-control" rows="5" name="body" form="comment" placeholder="Write your comment here...."></textarea>
  </div>
  <br/>
  <div style="text-align: right">
    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
    <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
        </div> 
 </div>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo e($ticket->subject); ?></h4>
      </div>
      <div class="modal-body">
          <form id="modal" action="/update/<?php echo e($ticket->id); ?>" method="post">

 <?php echo e(method_field('PATCH')); ?>


  <div class="form-group">
    <label for="email">Subject:</label>
    <input class="form-control" name="subject" value="<?php echo e($ticket->subject); ?>">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
   <textarea class="form-control" rows="5" form="modal" name="description"><?php echo e($ticket->description); ?></textarea>
   <span style="font-size: 11px; color: #c0c0c0">Describe your issue here in details</span>
  </div>
  <div class="row">
      <div class="col-md-3">
          <div class="form-group">
  <label>Priority:</label>
  <select class="form-control" name="priority">
      <option value="low">Low</option>
    <option value="normal">Normal</option>
    <option value="critical">Critical</option>
  </select>
</div>
 </div>

 <div class="col-md-3">
             <div class="form-group">
  <label>Category:</label>
  <?php echo e(Form::select('category_id', $categories, 'hahah',  ['class' => 'form-control'])); ?>

</div>
 </div>

  </div>
  <br/>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
      </div>
    </div>

  </div>
</div>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>