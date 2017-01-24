<?php

namespace App\Http\Controllers;


use App\Maid;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        return view('app');
    }
    public function getMaids(Request $request){
        $foo = $request->input('start');
        $foo2 = $request->input('end');
        $bar = $request->input('county');
        $list =  Maid::whereDoesntHave('reservations', function ($query) use ($foo, $foo2) {
            $query->whereBetween('start', [$foo, $foo2])->orWhereBetween('end', [$foo, $foo2]);
        })->whereHas('counties', function ($query) use ($bar) {
            $query->where('county', $bar);
        })->get();
        $maid = Maid::whereDoesntHave('reservations', function ($query) use ($foo, $foo2) {
            $query->whereBetween('start', [$foo, $foo2])->orWhereBetween('end', [$foo, $foo2]);
        })->whereHas('counties', function ($query) use ($bar) {
            $query->where('county', $bar);
        })->first();
        $reservation = new Reservation();
        $reservation->name = 'lol';
        $reservation->phone = "909";
        $reservation->email = "lol@lol.com";
        $reservation->address = "lol@lol.com";
        $reservation->start = $foo;
        $reservation->end = $foo2;
        $reservation->token = "loo";
        $reservation->rate = 12;
        $maid->reservations()->save($reservation);
        return $list;
//        $maid = Maid::find(1);
//        return $maid->counties()->get();
    }
}
