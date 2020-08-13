<?php

namespace App\Http\Controllers\Admin;

use App\Reserv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return back()->with('success', 'Reservation confirmed');
    }

    public function delete(Reserv $reserv)
    {
        $reserv->delete();

        return back()->with('success', 'Reservation deleted');
    }
}