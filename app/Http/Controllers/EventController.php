<?php

// namespace App\Http\Controllers;

// use App\Http\Requests\storeEenControoller;
// use App\Http\Requests\updateEvenControoller;
// use App\Models\event;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class EventController extends Controller
//  {
//        public function store(storeEenControoller $request)
//     {
       
//     //    $user_id=Auth::user()->id;
//     //    $ValidatedData=$request->validated();
//     //    $ValidatedData['user_id']=$user_id;
//        $event=event::create($request->all());
//         return response()->json($event,200);
//     }
//     public function index(Request $request )
//     {
//       $evevts=event::all();
//       //  return response()->json($evevt,200);
//       return view('home', compact('events'));
//     }
//     public function update(updateEvenControoller $request,$id)
//     {
//         $evevt=Event::findOrFail($id);
//         $evevt->update($request->all());
//         return response()->json($evevt,200);

//     }
//     public function show(Request $request,$id)
//     {
//       $Event=Event::findOrFail($id);
//     //   return response()->json($Event,200);
//       return view('event',compact('Event'));

//     }
//     public function delete($id)
//     {
//         $Event=Event::findOrFail($id);
//         $Event->delete();
//         return response()->json($Event,200);

//     }
//     public function search(Request $request)
// {
//     $events = Event::where('place', 'LIKE', '%' . $request->place . '%')
//         ->get();

//     return view('events.search', compact('events'));
// }

// }

//   public function index(Request $request)
//     {
//         $events = Event::all(); // تصحيح اسم المتغير
//         return view('home', compact('events')); // تمرير نفس الاسم
//     }

//     // حفظ فعالية جديدة
//     public function store(storeEenControoller $request)
//     {
//         // إذا أردت ربط الفعالية بالمستخدم المسجل
//         // $user_id = Auth::id();
//         // $validatedData = $request->validated();
//         // $validatedData['user_id'] = $user_id;
//         // $event = Event::create($validatedData);

//         $event = Event::create($request->all());
//         return response()->json($event, 200);
//     }

//     // تحديث فعالية موجودة
//     public function update(updateEvenControoller $request, $id)
//     {
//         $event = Event::findOrFail($id);
//         $event->update($request->all());
//         return response()->json($event, 200);
//     }

//     // عرض تفاصيل فعالية واحدة
//     public function show(Request $request, $id)
//     {
//         $event = Event::findOrFail($id);
//         return view('event', compact('event')); // تمرير $event للـ view
//     }

//     // حذف فعالية
//     public function delete($id)
//     {
//         $event = Event::findOrFail($id);
//         $event->delete();
//         return response()->json($event, 200);
//     }


// public function index() {
//     return view('admin.events.events', [
//         'events' => Event::latest()->get()
//     ]);
// }

// public function index()
//     {
//         $tickets = event::all();
//         return view('admin.events.events', compact('events'));
//     }

// public function index()
// {
//     $events = Event::latest()->get();    
//     return view('admin.events.events', compact('events'));
// }


    // public function store(Request $request)
    // {
    //     Event::create($request->validate([
    //         'name' => 'required',
    //         'description' => 'required|string',
    //         'date_start' => 'required|date',
    //         'date_end' => 'required|date',
    //         'place' => 'required|string',
    //         'qty_tick' => 'nullable|integer',
    //     ]));

    //     return back()->with('success', 'تم إنشاء الفعالية');
    // }
//     public function store(Request $request)
// {
//     $data = $request->validate([
//         'name'        => 'required|string|max:255',
//         'description' => 'required|string',
//         'date_start'  => 'required|date',
//         'date_end'    => 'required|date|after_or_equal:date_start',
//         'place'       => 'required|string|max:255',
//         'qty_tick'    => 'nullable|integer',
//     ]);

//     Event::create($data);

//     return back()->with('success', 'تم إنشاء الفعالية بنجاح');
// }


    // public function update(Request $request, Event $event)
    // {
    //     $event->update($request->all());
    //     return back()->with('success', 'تم التعديل');
    // }

    // public function destroy(Event $event)
    // {
    //     $event->delete();
    //     return back()->with('success', 'تم الحذف');
    // }


    // البحث عن الفعاليات حسب المكان
    // public function search(Request $request)
    // {
    //     $events = Event::where('place', 'LIKE', '%' . $request->place . '%')
    //         ->get();

    //     return view('events.search', compact('events'));
    // }

    // public function adminIndex()
    // {
    //     // $events = Event::all(); // يمكن تعديلها حسب الحاجة
    //     $events = Event::latest()->get();    

    //     return view('admin.events.events', compact('events'));
    // }
// }



// namespace App\Http\Controllers;

// use App\Models\Event;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class EventController extends Controller
// {
//     public function index(Request $request)
//     {
//         $events = event::latest()->get();
//         $editEvent = null;

//         if ($request->has('edit')) {
//             $editEvent = Event::findOrFail($request->edit);
//         }

//         return view('admin.events.index', compact('events', 'editEvent'));
//     }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'name'        => 'required|string|max:255',
//             'description' => 'required|string',
//             'date_start'  => 'required|date',
//             'date_end'    => 'required|date|after_or_equal:date_start',
//             'place'       => 'required|string|max:255',
//             'qty_tick'    => 'nullable|integer',
//             'image'       => 'nullable|image|max:2048',
//         ]);

//         if ($request->hasFile('image')) {
//             $data['image'] = $request->file('image')->store('events', 'public');
//         }

//         Event::create($data);

//         return back()->with('success', 'تم إنشاء الفعالية بنجاح');
//     }

//     public function update(Request $request, Event $event)
//     {
//         $data = $request->validate([
//             'name'        => 'required|string|max:255',
//             'description' => 'required|string',
//             'date_start'  => 'required|date',
//             'date_end'    => 'required|date|after_or_equal:date_start',
//             'place'       => 'required|string|max:255',
//             'qty_tick'    => 'nullable|integer',
//             'image'       => 'nullable|image|max:2048',
//         ]);

//         if ($request->hasFile('image')) {
//             if ($event->image) {
//                 Storage::disk('public')->delete($event->image);
//             }
//             $data['image'] = $request->file('image')->store('events', 'public');
//         }

//         $event->update($data);

//         return back()->with('success', 'تم تحديث الفعالية بنجاح');
//     }

//     public function destroy(Event $event)
//     {
//         if ($event->image) {
//             Storage::disk('public')->delete($event->image);
//         }

//         $event->delete();

//         return back()->with('success', 'تم حذف الفعالية بنجاح');
//     }
// }




namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::latest()->get();
        $editEvent = $request->has('edit') ? Event::findOrFail($request->edit) : null;
        return view('admin.events.index', compact('events', 'editEvent'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'date_start'  => 'required|date',
            'date_end'    => 'required|date|after_or_equal:date_start',
            'place'       => 'required|string|max:255',
            'qty_tick'    => 'nullable|integer',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);
        return back()->with('success', 'تم إنشاء الفعالية بنجاح');
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'date_start'  => 'required|date',
            'date_end'    => 'required|date|after_or_equal:date_start',
            'place'       => 'required|string|max:255',
            'qty_tick'    => 'nullable|integer',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) Storage::disk('public')->delete($event->image);
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);
        return back()->with('success', 'تم تحديث الفعالية بنجاح');
    }

    public function destroy(Event $event)
    {
        if ($event->image) Storage::disk('public')->delete($event->image);
        $event->delete();
        return back()->with('success', 'تم حذف الفعالية بنجاح');
    }

    public function show(Event $event)
{
    return view('events.show', compact('event'));
}
}


