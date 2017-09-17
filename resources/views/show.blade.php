@extends('layouts.app')

@section('content')

<div class="panel panel-default">
             <div class="panel-heading" style="background: #DCDCDC">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{$ticket->subject}}</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                  @if($ticket->status == 'pending')
                     <a href="/close/{{$ticket->id}}" class="btn btn-success">Mark Complete</a>
                  @else
                     <a href="/open/{{$ticket->id}}" class="btn btn-default">Mark Pending</a>
                    @endif
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
                     <a href="/delete/{{$ticket->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
          </div>

          <div class="panel-body">
             <div class="panel-body" style="background: #DCDCDC">
             	<div class="row" style="padding: 25px">
             		<div class="col-md-6">
             			<b>Owner</b>	: {{$ticket->user->name}}<br/>
             			<b>Status</b>	: {{$ticket->status}}<br/>
             			<b>Priority</b>	: {{$ticket->priority}}<br/>
             		</div>
             		<div class="col-md-6">
             			<b>Category</b>	: {{$ticket->category->name}}<br/>
             			<b>Created</b>	: {{$ticket->created_at}}<br/>
             			<b>Last Update</b>	: {{$ticket->updated_at}}<br/>
             		</div>
             	</div>
             </div>
             <div style="padding: 25px">
             <b>Decription</b><br/>
             {{$ticket->description}}
		</div>
          </div>
        </div> 
      <br/>
      <h3> Comment</h3>

      @foreach($comments as $comment)
      <div class="panel panel-default">
             <div class="panel-heading" style="background: #DCDCDC">
            <div class="row">
                <div class="col-md-6">
                    <b>{{$comment->user->name}}</b>
                </div>
                <div class="col-md-6" style="text-align: right">
                    {{$comment->created_at}}
                </div>
            </div>
          </div>
          <div class="panel-body">
             {{$comment->body}}
        </div> 
 </div>

@endforeach

 <div class="panel panel-default">
             <div class="panel-heading">
                    <h4>Reply</h4>
          </div>
          <div class="panel-body">
  <form action="{{url('/add/comment')}}" id="comment" method="post">
  <div class="form-group">
   <textarea class="form-control" rows="5" name="body" form="comment" placeholder="Write your comment here...."></textarea>
  </div>
  <br/>
  <div style="text-align: right">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
        <h4 class="modal-title">{{$ticket->subject}}</h4>
      </div>
      <div class="modal-body">
          <form id="modal" action="/update/{{$ticket->id}}" method="post">

 {{method_field('PATCH')}}

  <div class="form-group">
    <label for="email">Subject:</label>
    <input class="form-control" name="subject" value="{{$ticket->subject}}">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
   <textarea class="form-control" rows="5" form="modal" name="description">{{$ticket->description}}</textarea>
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
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
      </div>
    </div>

  </div>
</div>
      
@endsection