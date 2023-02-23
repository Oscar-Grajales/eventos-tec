<?php

namespace App\Http\Controllers;

use App\Events\EventStatusChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

use App\Models\Pack;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Event::class);

        $user = Auth::user();

        if($user->role == "manager") {
            $events = Event::all();
        } elseif($user->role == "employee") {
            $events = DB::table('events')->where('status', 'confirmed')->where('ends_at', '>', date("Y-m-d H:i:s"))->get();
        } else {
            $events = $user->events;
        }

        return view('events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($packId)
    {
        $this->authorize('create', Event::class);

        return view('new-event', compact('packId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pack = Pack::find($request->input('pack'));

        $event = Event::create([
            'name' => $request->input('name'),
            'price' => $pack->price,
            'starts_at' => $request->input('starts_at'),
            'ends_at' => $request->input('ends_at'),
            'user_id' => $request->user()->id,
            'pack_id' => $pack->id
        ]);

        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $event = Event::find($id);

        $this->authorize('view', $event);

        $payments = 0;

        $eventPayment = $event->payments->where('status', 'confirmed');
        foreach($eventPayment as $payment) {
            $payments += $payment->amount;
        }
        $remaining = $event->price - $payments;

        return view('view-event', compact('event', 'payments', 'remaining'));
        //return response()->json(['event'=>$event->toJson(), 'expenses'=>$expenses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        $this->authorize('update', $event);

        return view('edit-event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $this->authorize('update', $event);

        if(Auth::user()->role == "manager") {
            $event->price = $request->input('price');
            $event->status = $request->input('status');
            
            if($request->input('status') === "confirmed") {                
                $event->confirmed_by = Auth::id();
            }

            if(!is_null($request->input('reason'))) {
                $event->reason = $request->input('reason');
                $event->save();
                EventStatusChanged::dispatch($event);
            } else {
                $event->reason = null;
            }            
        } elseif(Auth::user()->role == "client") {            
            $event->starts_at = $request->input('starts_at');
            $event->ends_at = $request->input('ends_at');
        }

        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        $this->authorize('delete', $event);

        $event->delete();

        return back();
    }

    //podemos pasarle Request $request por si queremos mandar un api_token
    public function apiIndex() { 
        //dd($request->query('api_token'));

        $events = DB::table('events')->where('status', 'confirmed')->where('ends_at', '>', date("Y-m-d H:i:s"))->get();

        return response($events->toJson());
    }

}
