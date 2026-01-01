<?php

namespace App\Http\Controllers;

use App\Http\Requests\storTikController;
use App\Http\Requests\updateTikController;
use App\Models\event;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function getTicketUser($id)
    {

        $user=ticket::findOrFail($id)->user;
        return response()->json($user,200);
    }
//         public function store(storTikController $request)
//     {
//         $user_id=Auth::user()->id;
//         $ValidatedData=$request->validated();
//         $ValidatedData['user_id']=$user_id;
//        $event=ticket::create($ValidatedData);
//         return response()->json($event,200);
//     }       
//     public function index(Request $request )
//     {
        
//         $tickets=Auth::user()->tickets;
//        $evevt=Ticket::all();
//        return response()->json($tickets,200);
//     }
//     public function update(updateTikController $request,$id)
//     {
//         $user_id=Auth::user()->id;
//         $evevt=Ticket::findOrFail($id);
//         if($evevt->user_id!=$user_id)
//         return response()->json(['message'=>'this is not your'],403);
//         $evevt->update($request->validated());
//         return response()->json($evevt,200);

//     }
//     public function show(Request $request,$id)
//     {
//       $Event=Ticket::findOrFail($id);
//       return response()->json($Event,200);

//     }
//     public function delete($id)
//     {
//         $Event=ticket::findOrFail($id);
//         $Event->delete();
//         return response()->json($Event,200);

//     }
// }

public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets', compact('tickets'));
    }

    // public function store(event $event)
    // {
    //     Ticket::create([
    //         'name'  => 'required',
    //         'quty'   => 'required|integer',
    //         'price' => 'required|numeric',
    //         'user_id' => auth()->id(),
    //         'id_event' => $event->id,

    //     ]);

    //     return back()->with('success', 'تم حجز التذكرة بنجاح ');
    // }

    public function store(Event $event)
{
    Ticket::create([
        'name'     => 'تذكرة فعالية',
        'quty'     => 1,
        'price'    => 0,
        'user_id'  => auth()->id(),
        'id_event' => $event->id,
    ]);

    return back()->with('success', '🎉 تم حجز التذكرة بنجاح');
}


    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return back()->with('success', 'تم التعديل');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return back()->with('success', 'تم الحذف');
    }
}
