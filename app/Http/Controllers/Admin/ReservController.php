<?php

namespace App\Http\Controllers\Admin;

use App\Reserv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirm;
use Illuminate\Support\Facades\Notification;

class ReservController extends Controller
{

    public function index()
    {
        $reservs = Reserv::latest()->get();
        return view('admin.reserv.index', compact('reservs'));
    }

    public function confirm_reserv(Reserv $reserv)
    {
        $reserv->update([
            'status' => true
        ]);

        Notification::route('mail', $reserv->email)
            ->notify(new ReservationConfirm());

        return back()->with('success', 'Reservation confirmed');
    }

    public function delete(Reserv $reserv)
    {
        $reserv->delete();

        return back()->with('success', 'Reservation deleted');
    }
}