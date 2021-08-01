<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Binnacle;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\Normal;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $analyses = Analysis::where('patient_id',$id)->get();
        $reservations = Reservation::where('user_id',$id)->where('status',1)->get();
        $notifications = Notification::where('id','>=',1)->orWhereIn('analysis_id', $analyses)
        ->orWhereIn('reservation_id', $reservations)->whereDate('date','>=',Carbon::now('America/Caracas')->today())->get();
        // $notifications1 = Notification::WhereIn('reservation_id', $reservations)->orWhereIn('reservation_id', $reservations)->get();
        //dd($notifications);
        // $notifications->analysis->load('nurse');
        // $notifications->analysis->load('nurse');
        return view('patients.index',compact('user'), compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) // crea notificacion para analisis
    {
        $analysis = Analysis::findOrFail($id);
        //$analysis->load('notification');
        return view('notification.create', compact('analysis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials =   Request()->validate([
            'date' => ['required'],
            'detail' => ['required'],
            'analysis_id' => ['required']
        ]);
        $notification= Notification::create([
            'date' => request('date'),
            'detail' => request('detail'),
            'analysis_id' => request('analysis_id')
        ]);
        Binnacle::setInsert($notification->detail,"notification",Auth::user());
        return redirect()->route('analysis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('notification.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $credentials =   Request()->validate([
            'date' => ['required'],
            'detail' => ['required'],
        ]);

        $notification = Notification::findOrFail(request('notification_id'));
        $notification->date = request('date');
        $notification->detail = request('detail');
        $notification->update();
        Binnacle::setUpdate($notification->detail,"notification",Auth::user());
        return redirect()->route('analysis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
