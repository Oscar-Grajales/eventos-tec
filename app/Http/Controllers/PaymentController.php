<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Event;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Payment::class);

        $payments = Payment::all();

        return view('payments', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Payment::class);

        $payment = new Payment;
        $payment->amount = $request->input('amount');
        $payment->event_id = $request->input('event_id');
        $payment->status = "confirmed";
        $payment->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function confirm($id) {
        $payment = Payment::find($id);

        $this->authorize('update', $payment);

        $payment->status = "confirmed";
        $payment->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiStore(Request $request) {
        $event = Event::find($request->input('event_id'));

        if($event->status == "confirmed") {
            $payment = new Payment;
            $payment->amount = $request->input('amount');
            $payment->event_id = $event->id;
            $payment->status = "unconfirmed";
            $payment->save();

            return response($payment->toJson(), 201);
        } else {
            return response()->json(['msg' => 'Abono no realizado']);
        }
    }
}
