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
    public function getMaids(Request $request) {
        $foo = $request->input('start');
        $foo2 = $request->input('end');
        $bar = $request->input('county');
        $date = new \DateTime();
        $date->setTimestamp($foo);
        $foo3 = strtotime('01/01/1970' . $date->format('H:i:s'));
        $date->setTimestamp($foo2);
        $foo4 = strtotime('01/01/1970' . $date->format('H:i:s'));
        $list =  Maid::whereHas('workhours', function ($query) use ($foo3, $foo4) {
            $query->where('start','<=' ,$foo3)->where('end','>=' ,$foo4);
        })->whereDoesntHave('reservations', function ($query) use ($foo3, $foo4) {
            $query->whereBetween('start', [$foo3, $foo4])->orWhereBetween('end', [$foo3, $foo4]);
        })->whereHas('counties', function ($query) use ($bar) {
            $query->where('county', $bar);
        })->get();

        return $list;

    }
    public function saveReservation(Request $request) {
        $maid = Maid::find($request->input('maid'));
        $reservation = new Reservation();
        $reservation->name = $request->input('name');
        $reservation->phone = $request->input('phone');
        $reservation->email = $request->input('email');
        $reservation->address = $request->input('address');
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');
        $reservation->token = md5(rand());
        $reservation->rate = $request->input('rate');
        $maid->reservations()->save($reservation);
        $date = new \DateTime();
        $date->setTimestamp($reservation->start);
        $reservation->from = $date->format('g:i a');
        $reservation->date = $date->format("m/d/Y");
        $date->setTimestamp($reservation->end);
        $reservation->until = $date->format('g:i a');
        $reservation->maidName = $maid->name;
        $reservation->url = $_SERVER['SERVER_NAME'] . '/ticket/' . $reservation->token;
        return $reservation;
    }

    public function getReservation($ticket) {
        try{
        $ticket = Reservation::where('token', $ticket)->firstOrFail();
            } catch(\Exception $e){
                $ticket = new Reservation();
                $ticket->error = 'Ticket not found';
                return view('app', compact('ticket'));
        }
        $maid = Maid::find($ticket->maid_id);
        $date = new \DateTime();
        $date->setTimestamp($ticket->start);
        $ticket->from = $date->format('g:i a');
        $ticket->date = $date->format("m/d/Y");
        $date->setTimestamp($ticket->end);
        $ticket->until = $date->format('g:i a');
        $ticket->maidName = $maid->name;
        $ticket->url = $_SERVER['SERVER_NAME'] . '/ticket/' . $ticket->token;
        return view('app', compact('ticket'));
    }
    public function deleteReservation(Request $request) {
        $ticket = Reservation::where('token', $request->input('token'))->first();
        $ticket->delete();
        return $ticket;
    }
}
