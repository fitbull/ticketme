<?php $__env->startSection('content'); ?>
<?php $__env->startSection('completedtab','active'); ?>

    <div class="panel panel-default">
             <div class="panel-heading" style="background: #DCDCDC">
            <div class="row">
                <div class="col-md-6">
                    <h4>Completed Tickets</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                    <a href="/addticket" class="btn btn-success">Add New Ticket</a>
                </div>
            </div>
          </div>
          <div class="panel-body">
              <table class="table table-hover">
    <thead>
      <tr>
        <th style="width: 30%">Subject</th>
        <th>Status</th>
        <th>Last Updated</th>
        <th>Priority</th>
        <th>Owner</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
       <td> <a href="/ticket/<?php echo e($ticket->id); ?>" style="color: #777"><?php echo e($ticket->subject); ?></a></td>
        <td><span style="color: #f0ad4e "><?php echo e($ticket->status); ?></span></td>
        <td><?php echo e($ticket->updated_at); ?></td>
        <?php if($ticket->priority == 'low'): ?>
        <td><span style="color: #5cb85c"><?php echo e($ticket->priority); ?></span></td>
         <?php elseif($ticket->priority == 'normal'): ?>
        <td><span style="color: #f0ad4e"><?php echo e($ticket->priority); ?></span></td>
        <?php else: ?>
        <td><span style="color: #d9534f"><?php echo e($ticket->priority); ?></span></td>
        <?php endif; ?>
        <td><?php echo e($ticket->user->name); ?></td>
        <td><?php echo e($ticket->category->name); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    </tbody>
  </table>
          </div>
        </div> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>