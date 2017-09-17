@extends('layouts.app')

@section('content')

   <div class="panel panel-default">
             <div class="panel-heading" style="background: #DCDCDC">
            <div class="row">
                <div class="col-md-6">
                    <h4>Create New Ticket</h4>
                </div>
            </div>
          </div>
          <div class="panel-body">
          <form action="" method="post" id="addticket">
  <div class="form-group">
    <label>Subject:</label>
    <input class="form-control" name="subject">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
   <textarea class="form-control" rows="5" form="addticket" name="description"></textarea>
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
  {{ Form::select('category_id', $categories, 'hahah',  ['class' => 'form-control'])}}
</div>
 </div>

  </div>
  <br/>
   <input type="hidden" name="status" value="pending">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>
        </div> 

@endsection
