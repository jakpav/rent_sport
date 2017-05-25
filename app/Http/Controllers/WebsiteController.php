<?php

namespace App\Http\Controllers;

use App\Playground;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.index');
    }
    public function about(){
        return view('website.about');
    }
    public function sport_grounds(){

        $ps = Playground::all();
        $a = 0;

        return view('website.sportgrounds', compact('ps', 'a'));
    }
    public function reservation(){

        $ps = Playground::all();

        return view('website.reservation', compact('ps'));
    }
    public function make_reservation(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $playground = $request->input('playground');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $hours = $request->input('hours');

        $input = compact('name', 'email', 'playground', 'date_start', 'date_end', 'hours');
        $validation = true;
        foreach ($input as $item){
            if(!isset($item)){
                $validation = false;
            }
        }

        $ps = Playground::all();

        if($validation){
            $reservation = new Reservation();
            $reservation->name = $name;
            $reservation->email = $email;
            $reservation->start_date = $date_start;
            $reservation->end_date = $date_end;
            $reservation->hours = $hours;
            $reservation->playgrounds_id = $playground;

            if($reservation->save()){
                return view('website.reservation', compact('ps'));
            }else{
                return abort(500);
            }
        }else{
            return view('website.reservation', compact('ps', 'name', 'email', 'playground', 'date_start', 'date_end', 'hours'));
        }

        /*if(!$reservation->save()){
            return view('website.reservation', compact('ps', 'name', 'email', 'playground', 'date_start', 'date_end', 'hours'));
        }else{
            return view('website.reservation', compact('ps'));
        }*/

    }
    public function contact(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $message = $request->input('message');

        $input = compact('name', 'email', 'mobile', 'message');
        $validation = true;
        foreach ($input as $item){
            if(!isset($item)){
                $validation = false;
            }
        }

        if($validation){
            //Send email here

            return view('website.contact');
        }else{
            return view('website.contact', compact('name', 'email', 'mobile', 'message'));
        }
    }
}
