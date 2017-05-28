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
        $date = $request->input('date');
        $time_begin = $request->input('time_begin');
        $time_end = $request->input('time_end');

        $input = compact('name', 'email', 'playground', 'date', 'time_begin', 'time_end');
        $validation = true;
        foreach ($input as $item){
            if(!isset($item)){
                $validation = false;
            }
        }

        $ps = Playground::all();

        if($validation){

            $collision = Reservation::where('playgrounds_id', '=', $playground)
                ->where('date', '=', $date)->where('time_begin', '<', $time_end)
                ->where('time_end', '>', $time_begin)->count();


            if($time_end>$time_begin){
                if($collision < 1){
                    $reservation = new Reservation();

                    $reservation->name = $name;
                    $reservation->email = $email;
                    $reservation->date = $date;
                    $reservation->time_begin = $time_begin;
                    $reservation->time_end = $time_end;
                    $reservation->playgrounds_id = $playground;

                    if($reservation->save()){
                        $success = 'Vaša rezervácia prebehla úspešne.';
                        return view('website.reservation', compact('ps', 'success'));
                    }else{
                        return abort(500);
                    }
                }else{
                    $collision_message = 'Nemôžete si rezervovať ihrisko, z dôvodu inej rezervácie v tomto čase.';
                    return view('website.reservation', compact('ps', 'collision_message', 'name', 'email', 'playground', 'date', 'time_begin', 'time_end'));
                }
            }else{
                $time_message = 'Zadali ste nesprávny čas!';
                return view('website.reservation', compact('ps', 'time_message', 'name', 'email', 'playground', 'date', 'time_begin', 'time_end'));
            }

        }else{
            return view('website.reservation', compact('ps', 'name', 'email', 'playground', 'date', 'time_begin', 'time_end'));
        }
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
