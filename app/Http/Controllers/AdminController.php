<?php

namespace App\Http\Controllers;

use App\Playground;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.index');
    }
    public function reservations(){

        $reservations = Reservation::orderBy('id', 'desc')->get();

        return view('admin.reservations', compact('reservations'));
    }
    public function playgrounds(){

        $playgrounds = Playground::all();


        return view('admin.playgrounds', compact('playgrounds'));
    }
    public function customers(){
        return view('admin.customers');
    }
    public function discounts(){
        return view('admin.discounts');
    }
    public function add_playground(){
        return view('admin.add_playground');
    }
    public function insert_playground(Request $request){

        $type = $request->input('type');
        $description = $request->input('description');
        $price = $request->input('price');

        $input = compact('type', 'description', 'price');
        $validation = true;
        foreach ($input as $item) {
            if(!isset($item)){
                $validation = false;
            }
        }

        if($validation){
            $playground = new Playground();
            $playground->type = $type;
            $playground->description = $description;
            $playground->price = $price;

            if($playground->save()){
                return redirect('/admin/playgrounds');
            }else{
                return abort(500);
            }
        }else{
            return view('admin.add_playground', compact('type', 'description', 'price'));
        }
    }
    public function delete_playground(){
        $ps = Playground::all();

        return view('admin.delete_playground', compact('ps'));
    }
    public function delete_db_playground(Request $request){

        $p = $request->input('playground');

        if(isset($p)){
            if(Playground::destroy($p)){
                return redirect('/admin/playgrounds');
            }else{
                return abort(500);
            }
        }else{
            $ps = Playground::all();
            return view('admin.delete_playground', compact('ps'));
        }
    }
    public function add_reservation(){
        $playgrounds = Playground::all();
        return view('admin.add_reservation', compact('playgrounds'));
    }
    public function insert_reservation(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $hours = $request->input('hours');
        $playgrounds_id = $request->input('playgrounds_id');

        $input = compact('name', 'email', 'start_date', 'end_date', 'hours', 'playgrounds_id');
        $validation = true;
        foreach ($input as $item){
            if(!isset($item)){
                $validation = false;
            }
        }

        if($validation){
            $reservation = new Reservation();
            $reservation->name = $name;
            $reservation->email = $email;
            $reservation->start_date = $start_date;
            $reservation->end_date = $end_date;
            $reservation->hours = $hours;
            $reservation->playgrounds_id = $playgrounds_id;

            if($reservation->save()){
                return redirect('/admin/reservations');
            }else{
                return abort(500);
            }
        }else{
            $playgrounds = Playground::all();
            return view('admin.add_reservation', compact('playgrounds', 'name', 'email', 'start_date', 'end_date', 'hours', 'playgrounds_id'));
        }
    }
    public function delete_reservation(){
        $reservations = Reservation::all();
        return view('admin.delete_reservation', compact('reservations'));
    }
    public function delete_db_reservation(Request $request){
        $r = $request->input('reservation');

        if(isset($r)){
            if(Reservation::destroy($r)){
                return redirect('/admin/reservations');
            }else{
                return abort(500);
            }
        }else{
            $playgrounds = Playground::all();
            $reservation = Reservation::all();
            return view('admin.delete_reservation', compact('playgrounds', 'reservation'));
        }
    }
}
