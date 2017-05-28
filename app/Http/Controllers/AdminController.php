<?php

namespace App\Http\Controllers;

use App\Playground;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

        $reservations = Reservation::whereYear('date', '=', '2017')->count();

        $jan = Reservation::whereMonth('date', '=', '1')->whereYear('date', '=', '2017')->count();
        $feb = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '2')->count();
        $mar = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '3')->count();
        $apr = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '4')->count();
        $may = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '5')->count();
        $jun = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '6')->count();
        $jul = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '7')->count();
        $aug = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '8')->count();
        $sep = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '9')->count();
        $okt = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '10')->count();
        $nov = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '11')->count();
        $dec = Reservation::whereYear('date', '=', '2017')->whereMonth('date', '=', '12')->count();

        $res_play = Reservation::select(DB::raw('playgrounds_id, COUNT(playgrounds_id) as pocet'))->groupBy('playgrounds_id')->get();

        return view('admin.index', compact('reservations', 'res_play', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'));
    }
    public function reservations(){

        $reservations = Reservation::orderBy('id', 'desc')->simplePaginate(10);

        return view('admin.reservations', compact('reservations'));
    }
    public function playgrounds(){

        $playgrounds = Playground::simplePaginate(5);


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
        $date = $request->input('date');
        $time_begin = $request->input('time_begin');
        $time_end = $request->input('time_end');
        $playgrounds_id = $request->input('playgrounds_id');

        $input = compact('name', 'email', 'date', 'time_begin', 'time_end', 'playgrounds_id');
        $validation = true;
        foreach ($input as $item){
            if(!isset($item)){
                $validation = false;
            }
        }

        if($validation){

            $collision = Reservation::where('playgrounds_id', '=', $playgrounds_id)
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
                    $reservation->playgrounds_id = $playgrounds_id;

                    if($reservation->save()){
                        return redirect('/admin/reservations');
                    }else{
                        return abort(500);
                    }
                }else{
                    $playgrounds = Playground::all();
                    $collision_message = 'Nemožná rezervácia, z dôvodu inej rezervácie v tomto čase.';
                    return view('admin.add_reservation', compact('playgrounds', 'collision_message', 'name', 'email', 'playground', 'date', 'time_begin', 'time_end'));
                }
            }else{
                $playgrounds = Playground::all();
                $time_message = 'Zadali ste nesprávny čas.';
                return view('admin.add_reservation', compact('playgrounds', 'time_message', 'name', 'email', 'playground', 'date', 'time_begin', 'time_end'));
            }


        }else{
            $playgrounds = Playground::all();
            return view('admin.add_reservation', compact('playgrounds', 'name', 'email', 'date', 'time_begin', 'time_end', 'playgrounds_id'));
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
