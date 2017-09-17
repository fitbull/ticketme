@extends('layouts.app')

@section('content')
@section('completedtab','active')

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
      @foreach($tickets as $ticket)
      <tr>
       <td> <a href="/ticket/{{$ticket->id}}" style="color: #777">{{$ticket->subject}}</a></td>
        <td><span style="color: #f0ad4e ">{{$ticket->status}}</span></td>
        <td>{{$ticket->updated_at}}</td>
        @if($ticket->priority == 'low')
        <td><span style="color: #5cb85c">{{$ticket->priority}}</span></td>
         @elseif($ticket->priority == 'normal')
        <td><span style="color: #f0ad4e">{{$ticket->priority}}</span></td>
        @else
        <td><span style="color: #d9534f">{{$ticket->priority}}</span></td>
        @endif
        <td>{{$ticket->user->name}}</td>
        <td>{{$ticket->category->name}}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
          </div>
        </div> 

@endsection
