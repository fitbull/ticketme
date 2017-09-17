<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Ticket;
use App\User;
use App\Comment;
use Auth;

class crudController extends Controller
{
    public function add()
    {
        
        $categories = Category::pluck('name', 'id');


        return view('addnew',compact('categories'));

    }

    public function create(Request $request)
    {
        
        
        $user = Auth::user();
    	$ticket = new Ticket;

    	$ticket->user_id = $user->id;
    	$ticket->subject = $request->subject;
    	$ticket->category_id = $request->category_id;
    	$ticket->description = $request->description;
    	$ticket->priority = $request->priority;
    	$ticket->status = $request->status;
    	$ticket->save();


       return redirect('/home')->with('message', 'Your ticket are successfully added to our database'); 
    }

    public function view(Ticket $ticket)
    {
        
        
    	$categories = Category::pluck('name', 'id');

    	$comments = $ticket->comment;

        return view('show',compact('ticket','categories','comments'));

    }

    public function update(Request $request, Ticket $ticket)
    {
        
        
    	$ticket->update($request->all());

        return redirect('/home')->with('updated', 'Your ticket are successfully updated to our database');

    }


    public function destroy($pid)
    {
        $ticket = Ticket::where('id', $pid)->first();
        $ticket->delete();
        return redirect('/home')->with('deleted', 'Your ticket are successfully delete from our database');
    }


    public function close($ticket)
    {
        $solve = Ticket::where('id', $ticket)->first();
        $solve->status = 'completed';
        $solve->save();

        return back();
    }


    public function open($ticket)
    {
        $solve = Ticket::where('id', $ticket)->first();
        $solve->status = 'pending';
        $solve->save();

        return back();
    }


    public function comment(Request $request)
    {
        
        
    	$comment = new Comment;

    	$comment->user_id = $request->user_id;
    	$comment->body = $request->body;
    	$comment->ticket_id = $request->ticket_id;
    
    	$comment->save();


        return back();
   }

   public function completed()
    {

        $tickets = Ticket::all()->where('status','!=','pending');

        return view('completed', compact('tickets'));
    }


}
